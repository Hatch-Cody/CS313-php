<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="loginStyle.css">

    <title>Welcome Users</title>
    
</head>

<body class="body">

    <?php

    $username = $_GET['username'];
    echo "<h1>Welcome $username</h1>";
    ?>

</body>

</html>