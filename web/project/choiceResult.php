<?php
$group_id = $_GET['group_id'];
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
        <a href="projectHome.html">Home</a>
    </div>

    <div class="page">
        <div class="main">
            <h1 style="text-align: center;">Group Choice</h1>
            <div class="flexContainer">
                <div class="wideInfoBox">


                    <?php

                    $choices = new \Ds\Vector();
                    $leastFavorite = new \Ds\Vector();

                    require("dbConnect.php");
                    $db = get_db();

                    $query = 'SELECT * FROM "group_member" WHERE group_id = :group_id';
                    $statement = $db->prepare($query);
                    $statement->bindValue(':group_id', $group_id);
                    $statement->execute();

                    echo '<h1>Results</h1>';

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                        $choices->push('num_one');
                        $choices->push('num_two');
                        $choices->push('num_three');

                        $leastFavorite->push('least_favorite');

                        print_r($choices);
                        print_r($leastFavorite);

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