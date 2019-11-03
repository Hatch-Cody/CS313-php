<?php
$group_id = $_GET['group_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>We Choose Food</title>

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
            <h1 style="text-align: center;">We Choose Food</h1>
            <div class="flexContainer">
                <div class="wideInfoBox">

                    <?php

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

                        // remove unwanted spaces
                        $one   = preg_replace("/(^\s*)|(\s*$)/u", "", $one);
                        $two   = preg_replace("/(^\s*)|(\s*$)/u", "", $two);
                        $three = preg_replace("/(^\s*)|(\s*$)/u", "", $three);
                        $least = preg_replace("/(^\s*)|(\s*$)/u", "", $least);

                        array_push($tempArray, $one, $two, $three);
                        array_push($tempLeast, $least);
                    }

                    // remove blank elements in the array
                    $tempArray = array_filter($tempArray);
                    $tempLeast = array_filter($tempLeast);

                    // count duplicates and get rid of them, storing the count as a key=>value pair
                    $choices = array_count_values($tempArray);
                    $leastFavorite = array_count_values($tempLeast);

                    // sort the array by number that each restaurant was chosen
                    arsort($choices);
                    arsort($leastFavorite);

                    // get the keys for the arrays
                    $keys = array_keys($choices);
                    $keys2 = array_keys($leastFavorite);

                    echo '#1: ' . ucwords($keys[0]) . '<br>#2: ' . ucwords($keys[1]) . '<br>#3: ' . ucwords($keys[2]) . '<br><br><h2>Least Favorite</h2>' . ucwords($keys2[0]) . '<br>';

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