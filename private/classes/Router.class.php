<?php
class Router {
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
    if(preg_match($this->create_preg($url),$_SERVER['REQUEST_URI'],$matches)) {
      array_shift($matches);
      $method($matches);
      return true;
    }
    echo "Route Error";
    return false;
  }

  private function create_preg($url) {
    $preg_url = str_replace('/','\/',$url);
    $preg_url = '/^'.$preg_url.'$/';
    return $preg_url;
  }
}
