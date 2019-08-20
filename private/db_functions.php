<?php
function db_connect() {
  $database = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  if($database->connect_errno) {
    die('Error: '. $database->connect_error);
  }
  return $database;
}
