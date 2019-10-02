<!DOCTYPE html>
<html>
<body>
    <form method='post' action='display.php'>
        Name: <input type='text' name='person'><br>
        Email: <input type='text' name='email'><br>
        <p>Major:</p>
        <?php
        $majors = array("Computer Science", "Web Design and Development", "Computer information Technology", "Computer Engineering");
        foreach($majors as $major){
            echo "<input type='radio' name='major' value='$major'>$major<br>";
        }
        ?>
        <br>
        <textarea rows='20' cols='100' name='textarea'></textarea>
        <br>
        <p>Where you been bruh?</p>

        <?php
        $continentMap = array(
            'NA'=>"North America",
            'SA'=>"South America",
            'EU'=>"Europe",
            'AS'=>"Asia",
            'AU'=>"Australia",
            'AF'=>"Africa",
            'AN'=>"Antarctica",
        );

        $continents = array('NA', 'SA', 'EU', 'AS', 'AU', 'AF', 'AN');
        foreach($continents as $continent) {
            echo "<input type='checkbox' name='cont[]' value='$continent'>$continentMap[$continent]<br>";
        };
        ?>

        <input type='submit' name='submit' value='Send me away!'>
    </form>
</body>
</html>