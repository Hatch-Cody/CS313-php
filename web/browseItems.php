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

		<script>

			var obj, dbParam, xmlhttp;
			obj = { "table":"customers", "limit":10 };
			dbParam = JSON.stringify(obj);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("demo").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "json_demo_db.php?x=" + dbParam, true);
			xmlhttp.send();

			var myList = [
				{
					"product": [
						{
							"name": "iPhone 11",
							"brand": "Apple",
							"price": "999.00",
							"description": "6.1-Inch Liquid Retina HD LCD display Water and dust resistant Dual-camera system with 12MP Ultra wide and wide cameras;",
							"image": "http://www.demo.com"
						},
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
						}
					]
				}
			];

			// Builds the HTML Table out of myList.
			function buildHtmlTable(selector) {
				var columns = addAllColumnHeaders(myList, selector);

				for (var i = 0; i < myList.length; i++) {
					var row$ = $('<tr/>');
					for (var colIndex = 0; colIndex < columns.length; colIndex++) {
						var cellValue = myList[i][columns[colIndex]];
						if (cellValue == null) cellValue = "";
						row$.append($('<td/>').html(cellValue));
					}
					$(selector).append(row$);
				}
			}

			// Adds a header row to the table and returns the set of columns.
			// Need to do union of keys from all records as some records may not contain
			// all records.
			function addAllColumnHeaders(myList, selector) {
				var columnSet = [];
				var headerTr$ = $('<tr/>');

				for (var i = 0; i < myList.length; i++) {
					var rowHash = myList[i];
					for (var key in rowHash) {
						if ($.inArray(key, columnSet) == -1) {
							columnSet.push(key);
							headerTr$.append($('<th/>').html(key));
						}
					}
				}
				$(selector).append(headerTr$);

				return columnSet;


		</script>

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

			<div class="infoBox" onload="onLoad=buildHtmlTable('#excelDataTable')">

				

			</div>

			<footer class="footer">
				Page Designed By: Cody Hatch
			</footer>
		</div>
	</body>
</html>