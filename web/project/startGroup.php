<!DOCTYPE html>
<html lang="en">

<head>
    <title>Night Saver</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="project.css">

    <script>

        function copyText() {
            /* Get the text field */
            var copyText = document.getElementById("inviteCode");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

            // show snackbar alert that the code was copied
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function () { x.className = x.className.replace("show", ""); }, 2000);
        }

        function nav() {
            // wait two seconde then navigate to new page
            setTimeout(function () { window.location.assign("choicesForm.php"); }, 1000);
        }

        function generateCode() {
            var len = 7;
            var arr = "123456789abcdefghijklmnopqrstuvwxyz";
            var ans = '';
            for (var i = len; i > 0; i--) {
                ans +=
                    arr[Math.floor(Math.random() * arr.length)];
            }
            document.getElementById("inviteCode").value = ans;

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
                    <p>Here is your invite code:</p>
                    <input type="text" id="inviteCode" name="inviteCode" disabled>
                    <br>
                    <p>Send this code to your group</p>

                    <button onclick="copyText()">Copy Code</button><br>
                    <button onclick="nav()">Continue</button>

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