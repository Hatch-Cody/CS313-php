<!-- 
a list of items they can add to their cart and purchase. 
the kind of items and the formatting of this page is up to you.

provide a button or link to add an item to the cart. 
this should store that item to the session
then keep the user on the browse page. 
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Shopping</title> 

		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="cartStyle.css">

	</head>

	<body>

		<!-- Nav Bar -->
		<div class="topnav">
			<a class="active" href="#home">Home</a>
			<div class="floatRight">
				<a href="assignments.php">Cart</a>
			</div>
		</div>

		<div class="page">

			<div class="titleBackground">

				<?php

				// JSON string
				$productJSON = '[{
      				"name": "iPhone 11",
      				"brand": "Apple",
      				"price": "999.00",
      				"description": "6.1-Inch Liquid Retina HD LCD display Water and dust resistant Dual-camera system with 12MP Ultra wide and wide cameras;",
      				"image": "http://www.demo.com"
    			}
				{
      				"name": "Versa",
      				"brand": "Fitbit",
      				"price": "165.00",
      				"description": "Track your all-day activity, 24/7 heart rate, & sleep stages, all with a 4 plus day battery life",
      				"image": ""
    			},
    			{
      				"name": "Galaxy",
      				"brand": "Samsung",
      				"price": "954.00",
      				"description": "An immersive Cinematic Infinity Display, Pro grade Camera and Wireless PowerShare",
      				"image": ""
    			},
    			{
      				"name": "XPS_15_9570",
      				"brand": "dell",
      				"price": "2999.00",
      				"description": "8th Generation Intel Core i9-8950HK Processor (12M Cache, up to 4.8 GHz, 6 cores)",
      				"image": ""
    			}]';

				// Convert JSON string to Object
				$productObject = json_decode($productJSON);
				print_r($productObject);      // Dump all data of the Object
				echo $productObject[0]->name; // Access Object data

				$productObject = ...; // Replace ... with your PHP Object
				foreach($productObject as $key => $value) {
					echo $value->name . ", " . $value->gender . "<br>";
				}

				?>


			</div>

			<footer class="footer">
				Page Designed By: Cody Hatch
			</footer>
		</div>
	</body>
</html>