<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="google-signin-scope" content="profile email" />
<meta name="google-signin-client_id" content="189115273382-tk5hbmiq35icekp30v7rrcds0edbpigq.apps.googleusercontent.com" />
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/enc-base64.min.js"></script>
<title>WIRK</title>
<link href="wirk.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header">
	WIRK</div>
<div class="main">
	<div class="main_content" id="inside">
	    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-redirecturi="https://www.wirk.app/MySQLi/login.php">Sign in here!</div>
    <script>
      function onSignIn(googleUser) {
      	var profile = googleUser.getBasicProfile();
      	window.localStorage.setItem('id', profile.getId());
      	window.localStorage.setItem('lastName', profile.getFamilyName());
		window.localStorage.setItem('firstName', profile.getGivenName());
		window.localStorage.setItem('email', profile.getEmail());
		
		document.getElementById("id").value = profile.getId();
		document.getElementById("fname").value = profile.getGivenName();
		document.getElementById("lname").value = profile.getFamilyName();
		document.getElementById("email").value = profile.getEmail();
		document.getElementById("login").submit();

      	//window.location.href = "https://www.wirk.app/MySQLi/login.php";        
        document.getElementById("inside").innerHTML = 'Sign in successful!';
      };
      
    </script>	</div>
    <div id="status"></div>
    <form id="login" action="../MySQLi/login.php" method="post">
    <input id="id" name="id" type="hidden" value="" />
    <input id="fname" name="fname" type="hidden" value="" />
    <input id="lname" name="lname" type="hidden" value="" />
    <input id="email" name="email" type="hidden" value="" />
    </form>
</div>
<div class="footer">

	About | Contact |

	Employer Portal
</div>
</body>

</html>
