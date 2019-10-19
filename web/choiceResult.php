<?php
include_once 'includes/dbh.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Night Saver</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="project.css">

</head>

<body>

    <div class="page">
        <div class="main">
            <h1 style="text-align: center;">Night Saver</h1>
            <div class="flexContainer">
                <div class="wideInfoBox" id="">


                    <?php
                    try {
                        $dbUrl = getenv('DATABASE_URL');

                        $dbOpts = parse_url($dbUrl);

                        $dbHost = $dbOpts["host"];
                        $dbPort = $dbOpts["port"];
                        $dbUser = $dbOpts["user"];
                        $dbPassword = $dbOpts["pass"];
                        $dbName = ltrim($dbOpts["path"], '/');

                        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $ex) {
                        echo 'Error!: ' . $ex->getMessage();
                        die();
                    }

                    $statement = $db->query('SELECT username, num_one, num_two, num_three, least_favorite FROM group_member');

                    echo '<h1>Group Choices</h1>';
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        echo $row['username'] . ' | ' . $row['num_one'] . ' | ' . $row['num_two'] . ' | ' . 
                        $row['num_three'] . ' | ' . $row['least_favorite'] . '<br/>';
                    }
                    ?>



                </div>
            </div>
        </div>

        <footer class="footer">
            Page Designed By: Cody Hatch
        </footer>
    </div>

</body>

</html>