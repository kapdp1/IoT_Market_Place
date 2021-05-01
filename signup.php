







<html lang="en">
<head>
<title> signup </title>
  <link href="assets/css/login.css" rel="stylesheet">
 </head>
  <body>
	<form name="myForm" action="logged-index.php" method="post" onsubmit="return validateForm()" required>
		<div class="login-wrap">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
					<div class="login-form">
						<div class="sign-in-htm">
							<div class="group">
								<label for="user" class="label">Username</label>
								<input id="user" type="text" class="input" required>
							</div>
							<div class="group">
								<label for="pass" class="label">Password</label>
								<input id="pass" type="password" class="input" data-type="password" required>
							</div>
							<div class="group">
								<input id="check" type="checkbox" class="check" checked>
								<label for="check"><span class="icon"></span> Keep me Signed in</label>
							</div>
							<div class="group">
								<form method="get" action="logged-index.php">
									<input type="submit" class="button" value="Sign In" onclick="document.getElementById('user').style.display='block'>
								</form>
							</div>
							<div class="hr"></div>
							<div class="foot-lnk">
								<a href="#forgot">Forgot Password?</a>
							</div>
						</div>
						<div class="sign-up-htm">
							<div class="group">
								<label for="user" class="label">Username</label>
								<input id="user" type="text" class="input">
							</div>
							<div class="group">
								<label for="pass" class="label">Password</label>
								<input id="pass" type="password" class="input" data-type="password">
							</div>
							<div class="group">
								<label for="pass" class="label">Repeat Password</label>
								<input id="pass" type="password" class="input" data-type="password">
							</div>
							<div class="group">
								<label for="pass" class="label">Email Address</label>
								<input id="pass" type="text" class="input">
							</div>
							<div class="group">
								<input type="submit" class="button" value="Sign Up">
							</div>
							<div class="hr"></div>
							<div class="foot-lnk">
								<label for="tab-1">Already Member?</a>
							</div>
						</div>
					</div>
			</div>
		</div>
		</form>
	<script>
		// Get the modal
			var modal = document.getElementById('user');

		// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
			modal.style.display = "none";
				}
			}
			
			function validateForm() {
			var username = document.forms["myForm"]["user"].value;
			var pwd = document.forms["myForm"]["pass"].value; 
			if (username == "") {
			alert("User name must be filled out");
			return false;
				}
			}
			if(pwd == ""){
			alert("Password must be filled out");
			return false;
			}
	</script>
	
	<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['user'] = $myusername;
         
         header("location: signup.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
</body>
</html>