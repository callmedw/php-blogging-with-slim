<?php
class Entry {

  private $title;
  private $date;
  private $body;

  public function __construct($title, $date, $body) {
    $this->title = $title;
    $this->date = $date;
    $this->body = $body;
  }

  public function add_or_update_blog_entry($title, $date, $body, $entry_id = NULL) {
  // include 'connection.php';

    if ($entry_id) {
      $sql =  'UPDATE posts SET title = ?, date = ?, body = ? WHERE id = ?';
    } else {
      $sql = 'INSERT INTO posts(title, date, body) VALUES(?, ?, ?)';
    }

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $title, PDO::PARAM_STR);
      $results->bindValue(2, $date, PDO::PARAM_STR);
      $results->bindValue(3, $body, PDO::PARAM_STR);
      if ($entry_id) {
        $results->bindValue(4, $entry_id, PDO::PARAM_INT);
      }
      $results->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
    if ($db->lastInsertId()) {
      $entry_id = $db->lastInsertId();
    }
    if (!empty($tags)) {
      try {
        add_tags($tags);
        $tag_array = get_tag_ids($tags);
        populate_entry_tags_table($tag_array, $entry_id);
      } catch (Exception $e) {
        echo $e->getMessage();
        return false;
      }
      return true;
    }
  }


  function get_journal_entry_list() {
  // include 'connection.php';
    try {
      return $container['db']->query('SELECT * FROM posts ORDER BY date DESC');
    } catch (Exception $e) {
      echo $e->getMessage();
      return array();
    }
  }


}
