<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Personal Homepage</title> 

		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="aboutMe.css">

	</head>

	<body>

		<!-- Nav Bar -->
		<div class="topnav">
			<a href="home.php">Home</a>
			<a class="active" href="assignments.php">Assignments</a>
			<a href="intro.html">About Me</a>
		</div>

		<div class="page">
				
			<h1 style="text-align: center">Coming Soon</h1>
			
		<?php  
          echo "<div class='flexContainer'>";
           
          	for ($x = 1; $x <= 10; $x++) {
            	echo "
					<div>
						Assignment # $x
					</div>
				";
              
              if ($x % 2 == 0) {
              		echo "
              		</div>
              		<div class='flexContainer'>";
            	}
          };
          echo "</div>"
          ?>  
			
			

			<footer class="footer">
				Page Designed By: Cody Hatch
			</footer>
		</div>
	</body>
</html>