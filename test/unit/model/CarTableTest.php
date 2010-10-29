<?php

include sprintf("%s/../../bootstrap/model.php", dirname(__FILE__)); 

/**
 * CarTableTest 
 * 
 * @uses TestSuite
 * @package 
 * @version $id$
 * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
 * @license 
 */
class CarTableTest extends TestSuite
{
  /**
   * runs our tests
   *  
   * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
   * @access public
   * 
   * @return void
   */
  public function run()
  {
    $this->findAllCarsTest();
    $this->findAllCarsAssignedToUserTest();
  }

  /**
   * findAllCars Test 
   *  
   * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
   * @access public
   * 
   * @return void
   */
  public function findAllCarsTest()
  {
    $objects = Doctrine::getTable("Car")->findAllCars();
    $this->is(count($objects), 3, sprintf("We have got 2 cars"));
    $this->collection_isa_ok($objects, "Car", "All objects are instance of 'Car'");
  }

  /**
   * findAllCarsAssignedToUserTest 
   *  
   * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
   * @access public
   * 
   * @return void
   */
  public function findAllCarsAssignedToUserTest()
  {
    $user = Doctrine::getTable("User")->findOneByUsername("wowo");
    $this->isa_ok($user, "User", "We've got user 'wowo'");
    $objects = Doctrine::getTable("Car")->findAllCarsAssignedToUser($user->id);
    $this->is(count($objects), 2, "User 'wowo' has two cars");
    try {
      Doctrine::getTable("Car")->findAllCarsAssignedToUser("wowo");
      $this->fail("InvalidArgumentException should be thrown");
    } catch (InvalidArgumentException $e) {
      $this->pass(sprintf("InvalidArgumentException has been caught with message '%s'", $e->getMessage()));
    }
  }
}

new CarTableTest();
