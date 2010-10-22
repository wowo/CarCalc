<?

include sprintf("%s/../../bootstrap/model.php", dirname(__FILE__)); 
$t = new lime_test(null, new lime_output_color());

$cars = Doctrine::getTable("Car")->findAllCars();
$t->is(count($cars), 2, sprintf("We have got 2 cars"));
