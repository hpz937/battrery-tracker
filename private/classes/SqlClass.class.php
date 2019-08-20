<?php
class SqlClass {
  static protected $database;

  static public function set_database($database) {
    self::$database = $database;
  }

  static public function query($sql) {
    $result = self::$database->query($sql);
    if(self::$database->errno) {
      die("Error: ".self::$database->error);
    }
    return $result;
  }

  static protected function populateClass($class,$result) {
    $objects = [];
    while($row = $result->fetch_assoc()) {
      $object = new $class;
      foreach($row as $property=>$value) {
        if(property_exists($object,$property)) {
          $object->$property = $value;
        }
      }
      $objects[] = $object;
    }
    return $objects;
  }
}
