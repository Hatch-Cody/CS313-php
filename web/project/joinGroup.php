<?php
	require("databaseConnect.php");
	$db = get_db();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Night Saver</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="project.css">

    <script>

        function joinGroup() {
            // Get the text field
            var inviteCode = document.getElementById("inviteCode");
            
            // show snackbar alert that the group is connecting
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function () { x.className = x.className.replace("show", ""); }, 2000);

            // wait two seconde then navigate to new page
            setTimeout(function(){ window.location.assign("choicesForm.html"); }, 2000);
        }

    </script>
</head>

<body>
    <!-- Nav Bar -->
    <div class="topnav">
        <a href="projectHome.html">Home</a>
    </div>

    <div class="page">
        <div class="main">
            <h1 style="text-align: center;">Group Saver</h1>
            <div class="flexContainer">
                <div class="infoBox" id="infoBox" onload="">
                    <p>Enter invite code:</p>
                    <input type="text" id="inviteCode"><br>
                    <br>
                    <button onclick="joinGroup()">Join Group</button>
                    <div class="snackbar" id="snackbar">Joining the group...</div>

                </div>
            </div>
        </div>

        <footer class="footer">
            Page Designed By: Cody Hatch
        </footer>
    </div>
</body>

</html>