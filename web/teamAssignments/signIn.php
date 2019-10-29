<?php

require("dbConnect.php");
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];

echo "Username: $username, Password: $password";

/*
try {
$query = 'SELECT password FROM "user1" WHERE username = :username';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->execute();

$hashedPassword = $statement->fetch(PDO::FETCH_ASSOC);

if (password_verify($password, $hashedPassword))
{
    header('Location: welcomeUser.php');
}
}catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
	die();
}
*/

?>