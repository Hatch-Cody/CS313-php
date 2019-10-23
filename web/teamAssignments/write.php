<?php

  require 'databaseConnect.php';
  $db = get_db();

  $book=$_POST['book'];
  $chapter=$_POST['chapter'];
  $verse=$_POST['verse'];
  $content=$_POST['content'];
  $topicIds = $_POST['chkTopics'];

  try 
  {
    // prepare query with placeholders
    $query = 'INSERT INTO scripture(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';
    $statement = $db->prepare($query);

    // bind values to the placeholders
    $statement->bindValue(':book', $book);
    $statement->bindValue(':chapter', $chapter);
    $statement->bindValue(':verse', $verse);
    $statement->bindValue(':content', $content);

    $statement->execute();

    $scriptureId = $db->lastInsertId("scripture_id_seq");

    foreach ($topicIds as $topicId)
    {
      echo "ScriptureId: $scriptureId, topicId: $topicId";

      // prepare query for scriptureTopic
      $statement = $db->prepare('INSERT INTO scripture_topic(scriptureId, topicId) VALUES(:scriptureId, :topicId)');

      // bind values to placeholders
      $statement->bindValue(':scriptureId', $csriptureId);
      $statement->bindValue(':topicId', $topicId);

      $statement->execute();
    }
  }
  catch (Exception $ex)
  {
    echo "Error with database: $ex";
    die();
  }

  // redirect to showTopics page
  header("Location: showTopics.php");
  
  die();
  
?>
