<?php

include sprintf("%s/../../bootstrap/model.php", dirname(__FILE__)); 

/**
 * UserTableTest 
 * 
 * @uses TestSuite
 * @package 
 * @version $id$
 * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
 * @license 
 */
class UserTableTest extends TestSuite
{
  /**
   * run 
   *  
   * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
   * @access public
   * 
   * @return void
   */
  public function run()
  {
    $this->findAllUsersTest();
  }

  /**
   * findAllUsersTest 
   *  
   * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
   * @access public
   * 
   * @return void
   */
  public function findAllUsersTest()
  {
    $objects = Doctrine::getTable("User")->findAllUsers();
    $this->is(count($objects), 2, sprintf("We have got 2 users"));
    $this->collection_isa_ok($objects, "User", "All objects are instance of 'User'");
  }
}

new UserTableTest();
