<?php

require("dbConnect.php");
$db = get_db();




$username = $_POST['username'];
$password = $_POST['password'];
$hashedPassword =  password_hash($password, PASSWORD_DEFAULT);

try
{
   $query = "INSERT INTO user(username, password) VALUES(:username, :hashedPassword)";
   $statement = $db->prepare($query);
   $statement->bindValue(':username', $username);
   $statement->bindValue(':hashedPassword', $hashedPassword);
   $statement->execute();
}
catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}

header('Location: loginPage.php');

?>
