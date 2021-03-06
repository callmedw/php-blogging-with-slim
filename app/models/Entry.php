<?php
class Entry {

  // pull the last entered entry for redirect after new
  public function getLastEntryId($db) {
    return $db->lastInsertId();
  }

  // clean any inputs before saving them to database
  public function sanitize($input) {
    return trim(filter_var($input, FILTER_SANITIZE_STRING));
  }

  public function addOrUpdateEntry($db, $title, $body, $entry_id = NULL) {

    // sql statement depending on if we are adding or updating the entry
    if ($entry_id) {
      $sql =  'UPDATE posts SET title = ?, body = ? WHERE id = ?';
    } else {
      $sql = 'INSERT INTO posts(title, body) VALUES(?, ?)';
    }

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $title, PDO::PARAM_STR);
      $results->bindValue(2, $body, PDO::PARAM_STR);
      if ($entry_id) {
        $results->bindValue(3, $entry_id, PDO::PARAM_INT);
      }
      $results->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
    return true;
  }


  // return an array of blog entries
  public function getEntryList($db) {
    try {
      return $db->query('SELECT * FROM posts ORDER BY id ASC LIMIT 3');
    } catch (Exception $e) {
      $e->getMessage();
      return array();
    }
  }

  // get blog entry //
  public function getEntry($db, $entry_id){

    $sql = 'SELECT * FROM posts WHERE id = ?';

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $entry_id, PDO::PARAM_INT);
      $results->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
    return $results->fetch();
  }
}
