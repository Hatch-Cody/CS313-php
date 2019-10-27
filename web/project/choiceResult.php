<?php
require("dbConnect.php");
$db = get_db();

$group_id = $_POST['group_id'];
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
                    $statement = $db->query('SELECT 
                    username, 
                    num_one, 
                    num_two, 
                    num_three, 
                    least_favorite 
                    FROM group_member
                    WHERE group_id = $group_id');

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