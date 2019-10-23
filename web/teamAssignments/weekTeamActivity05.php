<?php

try {
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"], '/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
  echo 'Error!: ' . $ex->getMessage();
  die();
}

$statement = $db->query('SELECT book, chapter, verse, content FROM scripture');

echo '<h1>Scripture Resources</h1>';
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'] . '"<br/>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
  <form action="bobTheQueryBuilder()" method="get"><br>
    <!-- Book:    <input type="text" id="book"><br>
    Chapter: <input type="text" id="chapter"><br>
    Verse:   <input type="text" id="verse"><br>
    Content: <br><textarea rows="10" cols="50" id="content"></textarea><br> -->

    <label for="txtBooK">Book</label><br>
    <input type="text" id="txtBook" name="txtBook">
    <br><br>
    
    <label for="txtChapter">Chapter</label><br>
    <input type="text" id="txtChapter" name="txtChapter">
    <br><br>
    
    <label for="txtVerse">Verse</label><br>
    <input type="text" id="txtVerse" name="txtVerse">
    <br><br>

    <label for="txtContent">Content:</label><br>
    <textarea id="txtContent" name="txtContent" rows="4" cols="50"></textarea>
    <br><br>

    <label>Topics:</label><br><br>

    <?php

    try {

      $statement = $db->prepare('SELECT id, name FROM topic');
      $statement->execute();

      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $id   = $row['id'];
        $name = $row['name'];
        // keep checkbox value the same as the id of the label
        echo "<input type='checkbox' name='chkTopics[]' id='chkTopics$id' value='$id'>";

        // Also, so they can click on the label, and have it select the checkbox,
        // we need to use a label tag, and have it point to the id of the input element.
        // The trick here is that we need a unique id for each one. In this case,
        // we use "chkTopics" followed by the id, so that it becomes something like
        // "chkTopics1" and "chkTopics2", etc.
        echo "<label for='chkTopics$id'>$name</label><br>";
      }
    } catch (PDOException $ex) {
      echo "Error connecting to DB. Details: $ex";
      die();
    }

    echo "<br>"

    ?>

    <input type="submit" value="Add to Database">
  </form>

  <!-- <script>
    function bobTheQueryBuilder() {
      var book    = document.getElementById('book').value;
      var chapter = document.getElementById('chapter').value;
      var verse   = document.getElementById('verse').value;
      var content = document.getElementById('content').value;

      var query = `write.php?book=${book}&chapter=${chapter}&verse=${verse}&content=${content}`;

      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {}
      }
      xhr.open("POST", query, false);
      xhr.send();
    }
  </script> -->
</body>
</html>