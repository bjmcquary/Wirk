<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="google-signin-scope" content="profile email" />
<meta name="google-signin-client_id" content="189115273382-tk5hbmiq35icekp30v7rrcds0edbpigq.apps.googleusercontent.com" />
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/enc-base64.min.js"></script>
<title>WIRK: Dashboard</title>
<link href="wirk.css" rel="stylesheet" type="text/css" />
</head>
<!--Get google profile information-->
<script>
		if (window.localStorage.getItem('firstName') === null || window.localStorage.getItem('lastName') === null){
			window.location.href = "https://www.wirk.app/";
			}
		else{	  
		var firstName = window.localStorage.getItem('firstName');
		console.log(firstName);
		var lastName = window.localStorage.getItem('lastName');
		console.log(lastName);
		var nickname = window.localStorage.getItem('nickname');
		var id = window.localStorage.getItem('id');
		console.log(id);
		var email = window.localStorage.getItem('email');
		var hash = CryptoJS.HmacSHA256(email, "2f5969c2e8e85cb7e6351c48e5f0c8d58879b675") 
		Tawk_API = { 
			visitor: { 
			name: firstName.toString() + ' ' + lastName.toString(), 
			email: email.toString(),
			hash: hash.toString() 
			} 
		}
		} 
</script>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
  function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
	}
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{};
var Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bc7442508387933e5bba5eb/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!--Start of tawk.to Status Code-->

<script type="text/javascript">
Tawk_API = Tawk_API || {};
Tawk_API.onStatusChange = function (status){
document.getElementById('status').innerHTML += '<br/><input name="Button1" type="button" value="Click to chat!" onclick="Tawk_API.toggle()"/>';
};
</script>

<!--End of tawk.to Status Code -->
<body>

<div class="header">
WIRK
	<p class="account_info">
	<a href="https://www.wirk.app/" onclick="signOut();">Sign out</a><br/>
	<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
	<a href="javascript:{}" onclick="document.getElementById('upgrade').submit(); return false;">Become an Employee</a>
	</p>
	<form id="upgrade" action="../MySQLi/make_employee.php" method="post">
    <input id="id" name="id" type="hidden" value="" />
    </form>

</div>
<script>
document.getElementById("id").value = window.localStorage.getItem('id');
</script>

<div class="main">
<h1>Dashboard</h1>
<div class="main_content">
<div id="status"></div>
</div> 
</div>
<div class="footer">

	About | Contact |

	Employer Portal
</div>
</body>

</html>
