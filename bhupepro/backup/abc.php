<?php
//src on: https://gist.github.com/dol/e0b7f084e2e7158efc87
// see also https://gist.github.com/Soarez/9688998

// __DIR__ . '/tests/Helpers/openssl.cnf'
/*
[ req ]
distinguished_name = req_distinguished_name
req_extensions = v3_req
x509_extensions = v3_ca
[ req_distinguished_name ]
[ v3_req ]
basicConstraints = CA:FALSE
keyUsage = nonRepudiation, digitalSignature, keyEncipherment
subjectAltName = ${ENV::PHP_PASS_SUBJECTALTNAME}
[ v3_ca ]
subjectAltName = ${ENV::PHP_PASS_SUBJECTALTNAME}
 */


$keyConfig = [
    'private_key_type' => OPENSSL_KEYTYPE_RSA,
    'private_key_bits' => 2048,
];
$key = openssl_pkey_new($keyConfig);

$sanDomains = [
    'test999.io',
    'second.com',
    'superthird.net'
];

$dn = [
    'commonName' => reset($sanDomains),
];

$csrConfig = [
    'config' => __DIR__ . '/etc/ssl/openssl.cnf',
    'req_extensions' => 'v3_req',
    'x509_extensions' => 'v3_ca',
    'digest_alg' => 'sha256',
];
$addPrefix = function ($value) {
    return 'DNS:' . $value;
};
$sanDomainPrefixed = array_map($addPrefix, $sanDomains);
putenv('PHP_PASS_SUBJECTALTNAME=' . implode(',', $sanDomainPrefixed));

$csr = openssl_csr_new($dn, $key, $csrConfig);

if (false === $csr) {
    while (($e = openssl_error_string()) !== false) {
        echo $e . '\n';
    }
    return;
}
openssl_csr_export($csr, $csrout);
//openssl_x509_export(openssl_csr_sign($csr, null, $key, 30), $csrout);


echo "===== KEY v1 =======\r\n";
echo $key;

echo "===== KEY exported =======\r\n";

openssl_pkey_export($key, $expkey);
echo $expkey;

echo "===== EXPORT v1 =======\r\n";
echo $csrout;

openssl_x509_export(openssl_csr_sign($csr, null, $key, 30, $csrConfig), $csrout);

echo "===== EXPORT x509 =======\r\n";
echo $csrout;

echo "===== PARSED =======\r\n";

$out = openssl_x509_parse($csrout);
var_dump($out);
