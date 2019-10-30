<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="loginStyle.css">

    <title>Create an Account</title>

    <script>
        function validate() {

            var pass = document.getElementById('password').value;
            var check = document.getElementById('passwordMatch').value;

            var same = false;

            if (pass == check && pass.length > 7) {
                document.getElementById('password').style.borderColor = 'green';
                document.getElementById('passwordMatch').style.borderColor = 'green';
                document.getElementById('submitbutton') = enabled;
            } else {
                document.getElementById('password').style.borderColor = 'red';
                document.getElementById('passwordMatch').style.borderColor = 'red';
                document.getElementById('submitbutton') = disabled;
            }

        }

    </script>

</head>

<body>
    <div class="body">
        <div class="loginBox">
            <h1>Register</h1>
            <form action="signUp.php" method="POST">
                <input type="text" name="username" placeholder="username"><br>
                <input type="password" onkeyup="validate()" id="password" name="password" placeholder="password"><br>
                <input type="password" onkeyup="validate()" id="passwordMatch" name="passwordMatch" placeholder="password"><br>
                <br>

                <input type="submit" id="submitButton" value="submit" disabled>
            </form>
        </div>

    </div>


</body>

</html>