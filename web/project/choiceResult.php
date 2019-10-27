<?php
include_once 'includes/dbh.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Group Choice</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="project.css">

</head>

<body>
    <!-- Nav Bar -->
	<div class="topnav">
		<a class="active" href="projectHome.html">Home</a>
	</div>

    <div class="page">
        <div class="main">
            <h1 style="text-align: center;">Group Choice</h1>
            <div class="flexContainer">
                <div class="wideInfoBox">


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

                    $statement = $db->query('SELECT 
                    username, 
                    num_one, 
                    num_two, 
                    num_three, 
                    least_favorite 
                    FROM group_member
                    WHERE');

                    echo '<h1>Group Choices</h1>';

                    $index = 0;
                    //$choices = array([][]);

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                        $row['num_one'];
                        $row['num_two'];
                        $row['num_three'];
                        $row['least_favorite'];

                        echo $row['username'] . ' | ' . $row['num_one'] . ' | ' . $row['num_two'] . ' | ' .
                            $row['num_three'] . ' | ' . $row['least_favorite'] . '<br/>';
                            $index += 1;
                            
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