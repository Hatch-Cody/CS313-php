<?php

require("dbConnect.php");
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];

$query = 'SELECT password FROM "user1" WHERE username = :username';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->execute();

$hashedPassword = $statement->fetch(PDO::FETCH_ASSOC);

password_verify($password, $hashedPassword);


?>