<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$downloadDir = __DIR__ . "/download";
if (!file_exists($downloadDir)) {
    mkdir($downloadDir, 0777, true);
}

// Get POST inputs
$countryName = $_POST['countryName'] ?? '';
$state = $_POST['state'] ?? '';
$locality = $_POST['locality'] ?? '';
$organization = $_POST['organization'] ?? '';
$orgUnit = $_POST['organizationUnit'] ?? '';
$commonName = $_POST['commonName'] ?? '';
$subjectAltName = $_POST['subjectAltName'] ?? '';
$keySize = intval($_POST['keySize'] ?? 2048);

// Validate
if (!$commonName) {
    die("Common Name is required.");
}
if ($keySize < 1024) {
    die("Key size must be at least 1024 bits.");
}

// Handle SAN entries (wildcard or DNS)
$sanListRaw = explode(',', $subjectAltName);
$sanList = [];
foreach ($sanListRaw as $sanEntry) {
    $sanEntry = trim($sanEntry);
    if ($sanEntry === '') continue;
    if (stripos($sanEntry, 'DNS:') !== 0) {
        $sanEntry = 'DNS:' . $sanEntry;
    }
    $sanList[] = $sanEntry;
}
$includeSAN = !empty($sanList);

// Build DN
$dn = array(
    "countryName" => $countryName,
    "stateOrProvinceName" => $state,
    "localityName" => $locality,
    "organizationName" => $organization,
    "organizationalUnitName" => $orgUnit,
    "commonName" => $commonName,
);

// OpenSSL Config
$configContent = "[req]\n";
$configContent .= "distinguished_name = req_distinguished_name\n";
$configContent .= "prompt = no\n";
if ($includeSAN) {
    $configContent .= "req_extensions = req_ext\n";
}
$configContent .= "\n[req_distinguished_name]\n";
$configContent .= "C = {$countryName}\n";
$configContent .= "ST = {$state}\n";
$configContent .= "L = {$locality}\n";
$configContent .= "O = {$organization}\n";
$configContent .= "OU = {$orgUnit}\n";
$configContent .= "CN = {$commonName}\n";

if ($includeSAN) {
    $sanFormatted = implode(", ", $sanList);
    $configContent .= "\n[req_ext]\nsubjectAltName = {$sanFormatted}\n";
}

// Write config
$configPath = sys_get_temp_dir() . "/openssl_temp_" . uniqid() . ".cnf";
file_put_contents($configPath, $configContent);

// Generate private key
$privateKey = openssl_pkey_new([
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
    "private_key_bits" => $keySize,
]);
if (!$privateKey) {
    unlink($configPath);
    die("Failed to generate private key.");
}

// CSR options
$csrOptions = [
    "config" => $configPath,
    "digest_alg" => "sha256",
];
if ($includeSAN) {
    $csrOptions["req_extensions"] = "req_ext";
}

// Generate CSR
$csr = openssl_csr_new($dn, $privateKey, $csrOptions);
if (!$csr) {
    unlink($configPath);
    die("Failed to generate CSR. Check your input and config.");
}

// Export outputs
$csrOut = '';
$privateKeyOut = '';
openssl_csr_export($csr, $csrOut);
openssl_pkey_export($privateKey, $privateKeyOut);

// Save files
$csrFile = "$downloadDir/{$commonName}.csr";
$keyFile = "$downloadDir/{$commonName}.key";
file_put_contents($csrFile, $csrOut);
file_put_contents($keyFile, $privateKeyOut);

// Validate key and CSR match
$privateKeyDetails = openssl_pkey_get_details($privateKey);
$privateKeyModulus = $privateKeyDetails['rsa']['n'] ?? null;

$csrDetails = openssl_csr_get_public_key($csr);
$csrKeyDetails = openssl_pkey_get_details($csrDetails);
$csrModulus = $csrKeyDetails['rsa']['n'] ?? null;

$matchStatus = ($privateKeyModulus === $csrModulus) ? "✅ Keys match." : "❌ Keys do NOT match.";

// Get readable CSR info
$tempCsrFile = tempnam(sys_get_temp_dir(), "csr_");
file_put_contents($tempCsrFile, $csrOut);
$csrInfo = shell_exec("openssl req -in $tempCsrFile -noout -text");
unlink($tempCsrFile);
unlink($configPath);

// Output
echo "<h4>✅ CSR Information:</h4>";
echo "<pre>";
echo "Common Name: $commonName\n";
echo "Subject Alternative Names: " . implode(', ', $sanList) . "\n";
echo "Organization: $organization\n";
echo "Organization Unit: $orgUnit\n";
echo "Locality: $locality\n";
echo "State: $state\n";
echo "Country: $countryName\n";
echo "Key Size: $keySize bit\n";
echo "</pre>";

echo "<h4>🔐 CSR and Private Key Match Status:</h4>";
echo "<p style='font-weight:bold;'>" . $matchStatus . "</p>";

echo "<h4>⬇️ Download Files</h4>";
echo "<a href='download/{$commonName}.csr' download>Download CSR</a><br>";
echo "<a href='download/{$commonName}.key' download>Download Private Key</a><br>";
?>

