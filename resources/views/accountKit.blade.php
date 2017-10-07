<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
</head>
<body>

<div>
<input type="text" id="country_code" value="+88" />
<input type="text" id="phone_num" value="" />
<button onclick="phone_btn_onclick();">Login via SMS</button>
<input type="text" id="email" value="bipro77@gmail.com" />
<button onclick="email_btn_onclick();">Login via Email</button>
</div>


  <script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:"348730948912638",
        state:"abc",
        fbAppEventsEnabled:true,
        version:"v1.0",
        redirect:"http://localhost/loginmodule/login"
      }
    );
  };
  // login callback
  function loginCallback(response) {
    console.log(response);
    if (response.status === "PARTIALLY_AUTHENTICATED") {
     var code = response.code;
      var csrf = response.state;
      // Send code to server to exchange for access token
    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
    }
  }
  // phone form submission handler
  function phone_btn_onclick() {
    var country_code = document.getElementById("country_code").value;
    var ph_num = document.getElementById("phone_num").value;
    AccountKit.login('PHONE',
      {countryCode: country_code, phoneNumber: ph_num}, // will use default values if this is not specified
      loginCallback);
  }
  // email form submission handler
  function email_btn_onclick() {
    var emailAddress = document.getElementById("email").value;
    AccountKit.login('EMAIL', {emailAddress: emailAddress},  loginCallback);
  }

</script>
<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>

</body>
</html>