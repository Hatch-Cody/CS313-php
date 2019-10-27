<?php
// get the data from the POST
$group_id = $_GET['group_id'];
$num_one = "Arbys";
$num_two = "Panda";
$num_three = "Cafe Rio";


require("dbConnect.php");
$db = get_db();

try {
    $query = 'INSERT INTO group(group_id, num_one, num_two, num_three) VALUES(:group_id, :num_one, :num_two, :num_three)';
    $statement = $db->prepare($query);
    $statement->bindValue(':group_id', $group_id);
    $statement->bindValue(':num_one', $num_one);
    $statement->bindValue(':num_two', $num_two);
    $statement->bindValue(':num_three', $num_three);
    $statement->execute();

    // Now we bind the values to the placeholders. This does some nice things
    // including sanitizing the input with regard to sql commands.
} catch (Exception $ex) {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: <br> $ex";
    die();
}

// finally, redirect them to a new page to actually show the topics
header("Location: choicesForm.php?group_id=$group_id");

die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
