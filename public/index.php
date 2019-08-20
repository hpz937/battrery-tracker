<?php require_once('../private/bootstrap.php'); ?>
<?php
$router = new Router;
$router->get('/', function() {
  Pages::load("home");
});

$router->get('/battery/details/{id}', function($id) {
  Pages::$id = $id;
  Pages::load("edit");
});

$router->get('/battery/edit/{id}', function($id) {
  Pages::$id = $id;
  Pages::load("edit");
});

$router->post('/battery/save/{id}',function ($id) {
  $battery = new Battery;
  foreach($_POST as $property=>$value) {
    if(property_exists($battery,$property)) {
      $battery->$property = $value;
    }
  }
  // $args = array('brand'=>'Turnigy','model'=>'Battery4','c_rating'=>60,'capacity'=>1000,'date_added'=>'2019-08-19');
  // $battery = new Battery($args);
  // $battery->id = $id[0];
  if($battery->save()) {
    redirect("/");
  }
  else {
    die("Error");
  }
});
?>
