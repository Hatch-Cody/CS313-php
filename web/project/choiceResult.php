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

                    //$choices = new \Ds\Vector();
                    //$leastFavorite = new \Ds\Vector();

                    $choices = array();
                    $leastFavorite = array();

                    require("dbConnect.php");
                    $db = get_db();

                    $query = 'SELECT * FROM "group_member" WHERE group_id = :group_id';
                    $statement = $db->prepare($query);
                    $statement->bindValue(':group_id', $group_id);
                    $statement->execute();

                    echo '<h1>Results</h1>';

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                        $one   = strtolower($row['num_one']);
                        $two   = strtolower($row['num_two']);
                        $three = strtolower($row['num_three']);

                        $least = strtolower($row['least_favorite']);

                        for ($i = 0; i < sizeof($choices); $i++) {

                            if ($one != $choices[$i] && $choices[$i] == NULL) {
                                $choices[$i] = $one;
                                $choices[$i][0]++;
                            }

                            if ($two != $choices[$i] && $choices[$i] == NULL) {
                                $choices[$i] = $two;
                                $choices[$i][0]++;
                            }

                            if ($three != $choices[$i] && $choices[$i] == NULL) {
                                $choices[$i] = $three;
                                $$choices[$i][0]++;
                            }
                        }

                        for ($i = 0; i < sizeof($leastFavorite); $i++)
                            if ($least != $leastFavorite[$i] && $leastFavorite[$i] == NULL) {
                                $leastFavorite[$i] = $least;
                                $choices[$i][0]++;
                            }

                        print_r($choices);
                        print_r($leastFavorite);

                        echo $row['num_one'] . ' | ' . $row['num_two'] . ' | ' .
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