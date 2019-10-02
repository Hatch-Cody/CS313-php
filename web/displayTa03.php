<?php
$name = $_POST['person'];
$email = $_POST['email'];
$major = $_POST['major'];
$textarea = $_POST['textarea'];


$continents = $_POST['cont'];

$continentMap = array(
    'NA'=>"North America",
    'SA'=>"South America",
    'EU'=>"Europe",
    'AS'=>"Asia",
    'AU'=>"Australia",
    'AF'=>"Africa",
    'AN'=>"Antarctica",
);

?>

<!DOCTYPE html>
<html>
<body>
    <?php
    echo "<p>Your name: $name</p>";
    echo "<p>Your email: <a href='mailto:$email'>$email</a></p>";
    echo "<p>Your major: $major</p>";
    echo "<p>Comments: $textarea</p>";
    echo "<p>You have been to:</p>";
    foreach($continents as $continent) {
        echo "$continentMap[$continent]<br>";
    };
    ?>
</body>
</html>