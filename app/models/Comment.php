<?php
class Comment {

  // add comment to a blog entry
  public function addComment($db, $body, $entry_id, $name = NULL,) {

    // sql statement depending on if a name is supplied or not
    if ($name) {
      $sql = 'INSERT INTO comments(body, post_id, name) VALUES(?, ?, ?)';
    } else {
      $sql = 'INSERT INTO comments(body, post_id) VALUES(?, ?)';
    }

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $body, PDO::PARAM_STR);
      $results->bindValue(2, $entry_id, PDO::PARAM_STR);
      if ($name) {
        $$results->bindValue(3, $name, PDO::PARAM_STR);
      }
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
