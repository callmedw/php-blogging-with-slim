<?php
class Comment {

  // add/update comment
  function add_comment($name, $body, $comment_id = NULL) {

    if ($comment_id) {
      $sql =  'UPDATE comments SET name = ?, body = ? WHERE id = ?';
    } else {
      $sql = 'INSERT INTO comments(name, body) VALUES(?, ?, ?)';
    }

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $name, PDO::PARAM_STR);
      $results->bindValue(2, $body, PDO::PARAM_STR);
      if ($comment_id) {
        $results->bindValue(3, $comment_id, PDO::PARAM_INT);
      }
      $results->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
  }

  // get (read) all journal comments //
  function get_comment_list() {

    try {
      return $db->query('SELECT * FROM comments ORDER BY date DESC');
    } catch (Exception $e) {
      echo $e->getMessage();
      return array();
    }
  }

  // get (read) comment //
  function get_comment($comment_id){

    $sql = 'SELECT * FROM comments WHERE id = ?';

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $comment_id, PDO::PARAM_INT);
      $results->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
    return $results->fetch();
  }

  // delete comment //
  function delete_comment($comment_id){

    $sql = 'DELETE FROM comments WHERE id = ?';

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $comment_id, PDO::PARAM_INT);
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
