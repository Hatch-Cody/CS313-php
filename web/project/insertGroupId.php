<?php
// get the data from the POST
$group_id = $_GET['group_id'];

	require("dbConnect.php");
    $db = get_db();
    
try {
    $query = 'INSERT INTO group(group_id) VALUES(:group_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':group_id', $group_id);
    $statement->execute();

    // Now we bind the values to the placeholders. This does some nice things
    // including sanitizing the input with regard to sql commands.
} catch (Exception $ex) {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}

// finally, redirect them to a new page to actually show the topics
header("Location: choicesForm.php?group_id=$group_id");

die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
