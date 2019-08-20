<?php
// @TODO: function should be added to add available routes and check if route exists.
class Router {
  public $routed;

  public function get($url, $method) {
    if($_SERVER['REQUEST_METHOD']=='GET') {
      if($this->process_route($url,$method)) {
        return true;
      }
      return false;
    }
    return false;
  }

  public function post($url, $method) {
    if($_SERVER['REQUEST_METHOD']=='POST') {
      if($this->process_route($url,$method)) {
        return true;
      }
      return false;
    }
    return false;
  }

  private function process_route($url, $method) {
    if(preg_match($this->create_preg($url),$_SERVER['REQUEST_URI'],$matches) && !$this->routed) {
      array_shift($matches);
      $method($matches);
      $this->routed = true;
      return true;
    }
    return false;
  }

  private function create_preg($url) {
    $preg_url = str_replace('/','\/',$url);
    $preg_url = str_replace('{id}','(\d)', $preg_url);
    $preg_url = '/^'.$preg_url.'$/';
    return $preg_url;
  }

  public function __construct() {
    $this->routed = false;
  }
}
