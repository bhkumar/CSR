<!DOCTYPE html>
<html lang="en">
   <head>
<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>CSR Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=Open+Sans:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"> 
    <!-- Bootstrap -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     
    <![endif]-->

  </head>
  
   <body>
      <div class="main pt-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ms-auto me-auto">
	      <div class="csr-form d-flex flex-column">
	      <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 ms-auto me-auto"> 
                <div class="csr-form-heading p-3">CSR Form For TechOps</div>
		<div class="p-3" id="msg"></div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 ms-auto me-auto"> 
                <div class="csr-form-details p-3 ps-5 pe-5">
                <form name="" accept="" method="post">
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-lg-5 col-md-5 col-sm-12 col-form-label">Country Name</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control" id="countryName" placeholder="IN" value="">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-lg-5 col-md-5 col-sm-12 col-form-label">State</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control" id="state" placeholder="Uttar Pradesh" value="">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-lg-5 col-md-5 col-sm-12 col-form-label">Locality</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control" id="locality" placeholder="Noida" value="">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-lg-5 col-md-5 col-sm-12 col-form-label">Organization</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control" id="organization" placeholder="Adobe Inc." value="">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-lg-5 col-md-5 col-sm-12 col-form-label">Organizational Unit Name</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control" id="organizationUnit" placeholder="TechOps" value="">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-lg-5 col-md-5 col-sm-12 col-form-label">Common Name</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control" id="commonName" placeholder="adobe.com" value="">
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label for="inputEmail3" class="col-lg-5 col-md-5 col-sm-12 col-form-label">&nbsp;</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="altType1" name="altType" value="Wild Card">
                        <label class="form-check-label">Wild Card</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="altType2" name="altType" value="SAN" checked="checked">
                        <label class="form-check-label">SAN</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3 namesecure">
                    <label for="inputEmail3" class="col-lg-5 col-md-5 col-sm-12 col-form-label">Name to Secure</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="text" class="form-control" id="subjectAltName" placeholder="Alternative Name" value="">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-lg-5 col-md-5 col-sm-12 col-form-label">Key Size</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="keySize" name="keySize" value="2048" checked="checked">
                        <label class="form-check-label">2048</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="keySize" name="keySize" value="4096">
                        <label class="form-check-label">4096</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-lg-5 col-md-5 col-sm-12 col-form-label">&nbsp;</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                      <input type="submit" class="btn normal-btn btn-red" id="" value="Generate">
                    </div>
                  </div>
		</form>
		</div>
		</div>
              </div>
            </div>
          </div>
          
        </div>
      </div>

    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $("div.namesecure").show();
      $('input[type="radio"][name="altType"]').click(function(){
        var inputValue = $(this).attr("value");
        if(inputValue == 'SAN'){
          $("div.namesecure").show();
        }
        else{            
          $("div.namesecure").hide();
        }          
      });

      // Submit Form
      $("form").on("submit", function (e){
        e.preventDefault();
        var countryName = $("#countryName").val();
        var state = $("#state").val();
        var locality = $("#locality").val();
        var organization = $("#organization").val();
        var orgUnit = $("#organizationUnit").val();
        var commonName = $("#commonName").val();
        var altType = $("input[name='altType']:checked").val();
        var subjectAltName = $("#subjectAltName").val();
        var keySize = $("input[name='keySize']:checked").val();

        //alert(altType);

        if(countryName.trim()==""){
          alert("Please Enter Country !");
          $("#countryName").focus();
        }
        else if(state.trim()==""){
          alert("Please Enter State !");
          $("#state").focus();
        }
        else if(locality.trim()==""){
          alert("Please Enter Locality !");
          $("#locality").focus();
        }
        else if(organization.trim()==""){
          alert("Please Enter Organization Name !");
          $("#organization").focus();
        }
        else if(orgUnit.trim()==""){
          alert("Please Enter Organization Unit Name !");
          $("#organizationUnit").focus();
        }
        else if(commonName.trim()==""){
          alert("Please Enter Common Name !");
          $("#commonName").focus();
        }
        else if(altType=="SAN" && subjectAltName.trim()==""){
            alert("Please Enter Name to Secure !");
            $("#subjectAltName").focus();
        }
        else if($("input[name='keySize']").is(':checked')){
            var secureName = $("#subjectAltName").val().split(', ');
            var newSecureName="";
            var outputSecure = "";
           for(var i = 0; i < secureName.length; i++){
               newSecureName += "DNS:"+secureName[i]+", ";
           }
           outputSecure = newSecureName.slice(0,-2);
           
          var datastring = 'countryName='+countryName+'&state='+state+'&locality='+locality+'&organization='+organization+'&organizationUnit='+orgUnit+'&commonName='+commonName+'&altType='+altType+'&subjectAltName='+outputSecure+"&keySize="+keySize;
          
          $.ajax({
          url:'generate_key.php',
          type:'post',
          data:datastring,
          cache:false,
          success: function(response)
            {
              $("#msg").html(response);
            }
          });
        }
        else{
          alert("You are stuck");
        }
      });
    });
    </script>
  </body>
  </html>
