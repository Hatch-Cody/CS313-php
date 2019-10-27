<?php
require("databaseConnect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Group Saver</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="project.css">

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
    <!-- Nav Bar -->
    <div class="topnav">
        <a href="projectHome.html">Home</a>
    </div>

    <div class="page">
        <div class="main">
            <h1 style="text-align: center;">Group Choice</h1>
            <div class="flexContainer">
                <div class="infoBox" id="infoBox">

                    <form action="insertGroupId.php" method="get">
                        <div>
                            <label for="inviteCode">Invite Code:</label><br>
                            <input type="text" id="group_id" name="group_id" disabled>
                        </div>                        
                        <br>
                        <p>Send this code to your group</p>
                        
                        <button type="submit">Continue</button>

                    </form>

                    <br>
                    <button onclick="copyText()">Copy Code</button><br>


                    <div class="snackbar" id="snackbar">Copied invite code to clipboard</div>

                </div>
            </div>
        </div>

        <footer class="footer">
            Page Designed By: Cody Hatch
        </footer>
    </div>
</body>

</html>