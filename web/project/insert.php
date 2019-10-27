<?php
// get the data from the POST
$group_id       = $_POST['group_id'];
$username       = $_POST['name'];
$num_one        = $_POST['num_one'];
$num_two        = $_POST['num_two'];
$num_three      = $_POST['num_three'];
$least_favorite = $_POST['least_favorite'];

date_default_timezone_set("America/Denver");

require("dbConnect.php");
$db = get_db();

try {

   $query = 'INSERT INTO "group_member" (group_id, choice_one, choice_two, choice_three, least_favorite, username, date) VALUES(:group_id, :num_one, :num_two, :num_three, :least_favorite :username :date)';
   $statement = $db->prepare($query);
   $statement->bindValue(':group_id',       $group_id);
   $statement->bindValue(':num_one',        $num_one);
   $statement->bindValue(':num_two',        $num_two);
   $statement->bindValue(':num_three',      $num_three);
   $statement->bindValue(':least_favorite', $least_favorite);
   $statement->bindValue(':username',       $username);
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
header("Location: choiceResult.php");

die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.




       
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