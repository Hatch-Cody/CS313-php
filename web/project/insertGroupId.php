<?php
// get the data from the POST
$group_id = $_POST['group_id'];

require("dbConnect.php");
$db = get_db();

try {
    $query = 'INSERT INTO "group" (group_id) VALUES(:group_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':group_id', $group_id);
    $statement->execute();

} catch (Exception $ex) {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: <br> $ex";
    die();
}

// redirect to new page
header("Location: choicesForm.php?group_id=$group_id");

die();
