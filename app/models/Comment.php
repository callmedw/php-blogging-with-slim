<?php
class Comment {

  // add comment to a blog entry
  function addComment($name, $body, $entry_id) {
    $sql = 'INSERT INTO comments(name, body, entry_id) VALUES(?, ?, ?)';

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $name, PDO::PARAM_STR);
      $results->bindValue(2, $body, PDO::PARAM_STR);
      $results->bindValue(3, $entry_id, PDO::PARAM_STR);
      $results->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
    return true;
  }

  // get all blog entry comments //
  function getEntryComments($entry_id) {
    $sql = 'SELECT * FROM comments WHERE entry_id = ? ORDER BY date DESC';
    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $entry_id, PDO::PARAM_STR);
      $results->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      return array();
    }
    return $results;
  }
}
