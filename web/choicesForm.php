<?php
include_once 'includes/dbh.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Night Saver</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="project.css">

	<script>
		function submitChoices() {

			/* Get the text field */
			var name = document.getElementById("name");
			var one = document.getElementById("one");
			var two = document.getElementById("two");
			var three = document.getElementById("three");
			var least = document.getElementById("least");

			// show snackbar alert that the choices have been sent
			var x = document.getElementById("snackbar");
			x.className = "show";
			setTimeout(function() {
				x.className = x.className.replace("show", "");
			}, 3000);

			nav();

			return false;
		}

		function nav() {
			// wait two seconde then navigate to new page
			window.location.assign("choiceResult.php");
		}
	</script>

	<style>
		#snackbar {
			visibility: hidden;
			min-width: 250px;
			margin-left: -125px;
			background-color: #333;
			color: #fff;
			text-align: center;
			border-radius: 2px;
			padding: 16px;
			position: fixed;
			z-index: 1;
			left: 50%;
			bottom: 30px;
			font-size: 17px;
		}

		#snackbar.show {
			visibility: visible;
			-webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
			animation: fadein 0.5s, fadeout 0.5s 2.5s;
		}

		@-webkit-keyframes fadein {
			from { bottom: 0; opacity: 0; }
			to { bottom: 30px; opacity: 1; }
		}

		@keyframes fadein {
			from { bottom: 0; opacity: 0; 
			to { bottom: 30px; opacity: 1; }
		}

		@-webkit-keyframes fadeout {
			from { bottom: 30px; opacity: 1; }
			to { bottom: 0; opacity: 0; }
		}

		@keyframes fadeout {
			from { bottom: 30px; opacity: 1; }
			to { bottom: 0; opacity: 0 }
		}
	</style>

</head>

<body>
	<!-- Nav Bar -->
	<div class="topnav">
		<a href="projectHome.html">Home</a>
	</div>

	<div class="page">

		<div class="main">
			<h1 style="text-align: center;">Night Saver</h1>
			<div class="flexContainer">
				<form class="infoBox">
					<input type="text" id="name" placeholder="Name"><br>
					<input type="text" id="one" placeholder="First Choice"><br>
					<input type="text" id="two" placeholder="Second Choice"><br>
					<input type="text" id="three" placeholder="Third Choice"><br>
					<input type="text" id="least" placeholder="Least Favorite">
					<br>
					<input type="submit" onclick="submitChoices()">


				</form>
			</div>
		</div>

		<div class="snackbar" id="snackbar">Choices have been submitted</div>

		<footer class="footer">
			Page Designed By: Cody Hatch
		</footer>

	</div>
</body>

</html>