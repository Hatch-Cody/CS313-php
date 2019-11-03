<!DOCTYPE html>
<html lang="en">

<head>
    <title>Group Choice</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="project.css">

    <style>
        html,
        body {
            margin: 0;
            height: 100%;
            overflow: hidden;
        }
    </style>

</head>

<body onload="open()">
    <!-- Nav Bar -->
    <div class="topnav">
        <a href="projectHome.html">Home</a>
        <a href="about.php">About</a>
        <a href="#howItWorks">Instructions</a>
    </div>

    <div class="page">



        <!-- The Modal -->
        <div id="theModal" class="myModal myModal-backdrop">
            <div class="myModal-dialog">
                <div class="myModal-content">
                    <div class="myModal-header">
                        <h3 class="myModal-title"><b>About</b></h3>
                        <button type="button" class="closeButton">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="myModal-body">
                        <p style="font-family: 'Roboto', sans-serif;">
                            Have you ever been with a group of friends or family as they try to decide where they should go out to eat?
                            Of course you have! We all have! It is a battle as each person struggles to voice their opinion about which
                            place would be best or which places are a bad choice. It can get pretty chaotic, especially when you consider
                            they are all hangry.<br><br>

                            Group Choice was made to solve this problem so that you and your friends or family can avoid the brawl and get
                            on with your lives.<br><br>

                            This app was designed with simplicity in mind: All you have to do is make or join a group and input your top
                            three restaurant choices and if you have a restaurant that you dont like, put that in there too. Then all you
                            have to do is check the results to determine where you should go eat.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get the myModal
        var myModal = document.getElementById("theModal");

        // Get the button that opens the myModal
        var btn = document.getElementById("myModalButton");

        // Get the <span> element that closes the myModal
        var span = document.getElementsByClassName("closeButton")[0];

        // When the page loads, open the myModal 
        function open() {
            myModal.style.display = "block";
        }

        // When the user clicks the button, open the myModal 
        //btn.onclick = function() {
        //myModal.style.display = "block";
        //}

        // When the user clicks on <span> (x), close the myModal
        span.onclick = function() {
            myModal.style.display = "none";
            window.location.href = 'projectHome.html';
        }

        // When the user clicks anywhere outside of the myModal, close it
        window.onclick = function(event) {
            if (event.target == myModal) {
                myModal.style.display = "none";
                window.location.href = 'projectHome.html';
            }
        }
    </script>

    <footer class="footer">
        Page Designed By: Cody Hatch
    </footer>

</body>

</html>