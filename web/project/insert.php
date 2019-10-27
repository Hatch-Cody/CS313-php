<?php
// get the data from the POST
$group_id       = $_POST['group_id'];
$username       = $_POST['username'];
$num_one        = $_POST['num_one'];
$num_two        = $_POST['num_two'];
$num_three      = $_POST['num_three'];
$least_favorite = $_POST['least_favorite'];

require("dbConnect.php");
$db = get_db();

try {
   $query = 'INSERT INTO "group_member" (group_id, num_one, num_two, num_three, least_favorite, username) VALUES(:group_id, :num_one, :num_two, :num_three, :least_favorite, :username)';
   $statement = $db->prepare($query);
   $statement->bindValue(':group_id',       $group_id);
   $statement->bindValue(':num_one',        $num_one);
   $statement->bindValue(':num_two',        $num_two);
   $statement->bindValue(':num_three',      $num_three);
   $statement->bindValue(':least_favorite', $least_favorite);
   $statement->bindValue(':username',       $username);
   $statement->execute();

} catch (Exception $ex) {
   // Please be aware that you don't want to output the Exception message in
   // a production environment
   echo "Error with DB. Details: $ex";
   die();
}

// redirect to new page
header("Location: choiceResult.php?group_id=$group_id");

die();




       
   // $query = 'UPDATE group
   // SET (num_one, num_two, num_three, least_favorite, username, group_id, date) = (:num_one :num_two :num_three :least_favorite :username :group_id :date) 
   // WHERE group_id = "$group_id"';

   // $statement = $db->prepare($query);
   // $statement->bindValue(':num_one', $num_one);
   // $statement->bindValue(':num_two', $num_two);
   // $statement->bindValue(':num_three', $num_three);
   // $statement->bindValue(':least_favorite', $least_favorite);
   // $statement->bindValue(':username', $username);
   // $statement->bindValue(':group_id', $group_id);
   // $statement->bindValue(':date', '\'now()\'');
   // $statement->execute();