<!DOCTYPE html>
<html>

<head>
	<title>Dragon Traders</title>
	<script src="DevamLogin.js" type="text/javascript"></script>
	<link href="DevamLogin.css" rel="stylesheet" type="text/css" />


</head>

<body>
	<center>
		<div id="main-nav" class="collapse navbar-collapse" style="align-self: center;">
			<ul class="nav navbar-nav">
				<a href="index.html">Welcome to Dragon Traders Book Site</a>
			</ul>
		</div>
	</center>

	<div class="login-wrap">

		<div class="login-html">
			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
				In</label>
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
			<div class="login-form">
				<div class="sign-in-htm">
					<form action="db.php" method="post">
						<div class="group">
							<label for="user" class="label">Username</label>
							<input id="user" type="text" class="input" name="username">
						</div>
						<div class="group">
							<label for="pass" class="label">Password</label>
							<input id="pass" type="password" class="input" name="password" data-type="password">
						</div>
						<div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check"><span class="icon"></span> Keep me Signed in</label>
						</div>
						<div class="group">
							<input type="submit" class="button" name="login" value="Sign In">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<a href="#forgot">Forgot Password?</a>
						</div>
					</form>
				</div>
				<div class="sign-up-htm">
					<form action="db.php" method="post">
						<div class="group">
							<label for="user" class="label">Name</label>
							<input id="user" type="text" class="input" name="name">
						</div>
						<div class="group">
							<label for="user" class="label">Username</label>
							<input id="user" type="text" class="input" name="username">
						</div>
						<div class="group">
							<label for="pass" class="label">Password</label>
							<input id="pass" type="password" class="input" name="password" data-type="password">
						</div>
						<div class="group">
							<label for="pass" class="label">Repeat Password</label>
							<input id="pass" type="password" class="input" name="confirmpassword" data-type="password">
						</div>
						<div class="group">
							<label for="pass" class="label">Email Address</label>
							<input id="pass" type="text" class="input" name="email">
						</div>
						<div class="group">
							<input type="submit" class="button" name="register" value="Sign Up">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<label for="tab-1">Already Member?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<!--
  This was created based on the Dribble shot by Deepak Yadav that you can find at https://goo.gl/XRALsw
  I'm @hk95 on GitHub. Feel free to message me anytime.
-->