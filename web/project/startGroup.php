<!DOCTYPE html>
<html lang="en">

<head>
    <title>Group Choice</title>

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
			from {
				bottom: 0;
				opacity: 0;
			}

			to {
				bottom: 30px;
				opacity: 1;
			}
		}

		@keyframes fadein {
			from {
				bottom: 0;
				opacity: 0;

				to {
					bottom: 30px;
					opacity: 1;
				}
			}

			@-webkit-keyframes fadeout {
				from {
					bottom: 30px;
					opacity: 1;
				}

				to {
					bottom: 0;
					opacity: 0;
				}
			}

			@keyframes fadeout {
				from {
					bottom: 30px;
					opacity: 1;
				}

				to {
					bottom: 0;
					opacity: 0
				}
			}
	</style>

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
                    <form action="insertGroupId.php" method="POST">
                        <div>
                            <label for="inviteCode">Invite Code:</label><br>
                            <input type="text" id="group_id" name="group_id"><br>
                            <button onclick="copyText()">Copy Code</button><br>
                        </div>

                        <p>Send this code to your group</p>
                        <button type="submit">Continue</button><br>
                    </form>

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