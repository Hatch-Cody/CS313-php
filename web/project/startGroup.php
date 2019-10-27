<?php
require("dbConnect.php");
$db = get_db();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Week 6 class activity</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script>
		function copyText() {
			var copyText = document.getElementById("group_id");

			copyText.select();
			copyText.setSelectionRange(0, 99999);

			document.execCommand("copy");

			var x = document.getElementById("snackbar");
			x.className = "show";

			setTimeout(function() {
				x.className = x.className.replace("show", "");
			}, 2000);
		}

		function nav() {
			// wait two seconde then navigate to new page
			setTimeout(function() {
				window.location.assign("choicesForm.php");
			}, 1000);
		}

		function generateCode() {
			var len = 7;
			var arr = "123456789abcdefghijklmnopqrstuvwxyz";
			var ans = '';
			for (var i = len; i > 0; i--) {
				ans +=
					arr[Math.floor(Math.random() * arr.length)];
			}
			document.getElementById("group_id").value = ans;

			return ans;
		}
	</script>

</head>

<body onload="generateCode()">
	<div class="container">

		<form action="insert.php" method="POST">

			<div class="form-row">

				<div class="form-group col">
					<label for="inviteCode">Invite Code:</label>
					<input type="text" class="form-control" name="group_id">
				</div>

			</div>

			<div class="row">
				<button type="submit" class="btn btn-primary">Continue</button>
			</div>

		</form>
	</div>
</body>

</html>