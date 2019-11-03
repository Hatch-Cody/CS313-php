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

                    // debugging
                    function console_log($data)
                    {
                        echo '<script>';
                        echo 'console.log(' . json_encode($data) . ')';
                        echo '</script>';
                    }

                    $tempArray = array();
                    $tempLeast = array();

                    require("dbConnect.php");
                    $db = get_db();

                    $query = 'SELECT * FROM "group_member" WHERE group_id = :group_id';
                    $statement = $db->prepare($query);
                    $statement->bindValue(':group_id', $group_id);
                    $statement->execute();

                    echo '<h1>Results</h1>';

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                        // remove any uppercast characters
                        $one   = strtolower($row['num_one']);
                        $two   = strtolower($row['num_two']);
                        $three = strtolower($row['num_three']);
                        $least = strtolower($row['least_favorite']);

                        // remove unwanted punctuation
                        $one   = preg_replace("/(?![.=$'€%-])\p{P}/u", "", $one);
                        $two   = preg_replace("/(?![.=$'€%-])\p{P}/u", "", $two);
                        $three = preg_replace("/(?![.=$'€%-])\p{P}/u", "", $three);
                        $least = preg_replace("/(?![.=$'€%-])\p{P}/u", "", $least);

                        // debugging
                        console_log($one);
                        console_log($two);
                        console_log($three);
                        console_log($least);

                        array_push($tempArray, $one, $two, $three);
                        array_push($tempLeast, $least);


                        //echo $one . ' | ' . $two . ' | ' .
                        //   $three . ' | ' . $least . '<br/>';
                    }

                    // debugging
                    console_log($tempArray);
                    console_log($tempLeast);

                    // count duplicates and get rid of them, storing the count as a key=>value pair
                    $choices = array_count_values($tempArray);
                    $leastFavorite = array_count_values($tempLeast);

                    // debugging
                    console_log($choices);
                    console_log($leastFavorite);

                    arsort($choices);
                    arsort($leastFavorite);

                    // debugging
                    console_log($choices);
                    console_log($leastFavorite);

                    $keys = array_keys($choices);
                    $keys2 = array_keys($leastFavorite);

                    // debugging
                    print_r($choices);

                    echo $keys[0] . ' | ' . $keys[1] . ' | ' . $keys[2] . '<br><br><h2>Least Favorite</h2>' . $keys2[0] . '<br>';

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