<?php
class Entry {

  public function addOrUpdateEntry($db, $title, $body, $entry_id = NULL) {

    if ($entry_id) {
      $sql =  'UPDATE posts SET title = ?, body = ? WHERE id = ?';
    } else {
      $sql = 'INSERT INTO posts(title, body) VALUES(?, ?, ?)';
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

  public function getEntryList($db) {
    try {
      return $db->query('SELECT * FROM posts ORDER BY date DESC');
    } catch (Exception $e) {
      $e->getMessage();
      return array();
    }
  }

  // get (read) blog entry //
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

  // delete blog entry //
  public function deleteEntry($db, $entry_id){

    $sql = 'DELETE FROM posts WHERE id = ?';

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $entry_id, PDO::PARAM_INT);
      $results->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
    if ($results->rowCount() > 0 ) {
      return true;
    } else {
      return false;
    }
  }

}
