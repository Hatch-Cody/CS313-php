<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="loginStyle.css">
		
		<title></title>
		
	</head>
	
	<body class="body">
		<div class="loginBox">
			
			<img src="assets/avatar.png" class="avatar">
			
			<h1> Login Here </h1>
			
			<input action="signIn.php" method="POST">
				<p>username:</p>
				<input type="text"     name="" placeholder="Enter Username">
				
				<p>password:</p>
				<input type="password" name="" placeholder="Enter Password">
				
				<input type="submit"   name="" value="Login">
				
				<a href="#" >Forgot your password?</a> <br>
				<a href="userSignUp.php" >Dont have an account?</a> 
			
		</div>
	</body>
</html>