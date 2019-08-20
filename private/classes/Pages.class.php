<?php
class Pages {
  static protected $page_title;
  static public $id;

  static public function load($name) {
    $filename = PAGES.$name.'.phtml';
    if(file_exists($filename)) {
      if($_SERVER['REQUEST_METHOD']=='GET') {
        require_once(INCLUDES.'header.phtml');
      }
      require_once($filename);
      if($_SERVER['REQUEST_METHOD']=='GET') {
        require_once(INCLUDES.'footer.phtml');
      }
    }
    else {
      die("Page Not Found");
    }
  }

  static public function set_title($title) {
    self::$page_title = $title;
  }

  static public function get_title() {
    if(!empty(self::$page_title)) {
      return self::$page_title;
    }
    return PROJECT_NAME;
  }
}
