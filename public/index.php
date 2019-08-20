<?php require_once('../private/bootstrap.php'); ?>
<?php if($_SERVER['REQUEST_METHOD']=='GET') { require_once(INCLUDES.'header.phtml'); } ?>

<?php
$router = new Router;
$router->get('/', function() {
  echo "<h1>Hello World</h1>";
});

$router->post('/battery/save/(\d)',function ($id) {
  $args = array('brand'=>'Turnigy','model'=>'Battery4','c_rating'=>60,'capacity'=>1000,'date_added'=>'2019-08-19');
  $battery = new Battery($args);
  $battery->id = $id[0];
  $battery->save();
});
?>
<?php
// $list = Battery::getAll();
// foreach($list as $item) {
//   echo "<pre>";
//   var_dump($item);
//   echo "</pre>\n";
// }
 ?>

<?php if($_SERVER['REQUEST_METHOD']=='GET') { require_once(INCLUDES.'footer.phtml'); }?>
