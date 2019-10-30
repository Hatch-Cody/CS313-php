<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="loginStyle.css">
		
		<title></title>
		
	</head>
	
	<body class="body">
		<div class="loginBox">

			<h1> Login Here </h1>
			
			<form action="signIn.php" method="POST">
				<p>username:</p>
				<input type="text"     name="username" placeholder="Enter Username">
				
				<p>password:</p>
				<input type="password" name="password" placeholder="Enter Password">
				
				<input type="submit" value="Login">
				
				<a href="userSignUp.php" >Dont have an account?</a> 
			</form>
			
		</div>
	</body>
</html>