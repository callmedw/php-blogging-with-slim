<?php
class Comment {

  // add comment to a blog entry
  public function addComment($db, $name, $body, $entry_id) {
    $sql = 'INSERT INTO comments(name, body, post_id) VALUES(?, ?, ?)';

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
  public function getEntryComments($db, $entry_id) {
    $sql = 'SELECT * FROM comments WHERE post_id = ?';
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
