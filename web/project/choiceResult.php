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

                    $tempArray = array();
                    //$choices = array();
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

                        array_push($tempArray, $one, $two, $three);


                        echo $one . ' | ' . $two . ' | ' .
                            $three . ' | ' . $least . '<br/>';
                    }

                    $choices = arsort(array_count_values($tempArray));

                    echo '<br> <br>';
                    print_r(max($choices));
                    echo '<br> max key ^ choices--<br>';
                    print_r($choices);

                    // $choiceLeader = "";
                    // $choiceSecond = "";
                    // $choiceThird  = "";

                    // // loop through all the choices
                    // for ($i = 0; i < sizeof($choices); $i++) {

                    //     // set temp values 
                    //     $one   = 0;
                    //     $two   = 0;
                    //     $three = 0;

                    //     echo $choices[$i] . '<br>';

                    //     // get 1st, 2nd, and 3rd place choices
                    //     if ($choices[$i][0] > $one) {
                    //         $choiceLeader = $choices[$i];
                    //         $one = $choices[$i][0];
                    //     } else if ($choices[$i][0] > $two) {
                    //         $numTwo = $choices[$i];
                    //         $two = $choices[$i][0];
                    //     } else if ($choices[$i][0] > $three) {
                    //         $choiceThird = $choices[$i];
                    //         $three = $choices[$i][0];
                    //     }
                    // }

                    echo 'Results: ' . $choices[0] . ' | ' . $choices[1] . ' | ' . $choices[2] . '<br>';




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