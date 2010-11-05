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
class CombustionManagerTest extends TestSuite
{
  public function run()
  {
    $this->willFailOnWrongParameterTypeTest();
    $this->willFailOnDifferentTypesInCollection();
    $this->willFailOnBillsOthersThanFuelBill();
    $this->willReturnZeroForEmptyArray();
  }

  /**
   * willFailOnWrongParameterTypeTest 
   * 
   * @access public
   * @return void
   */
  public function willFailOnWrongParameterTypeTest()
  {
    $manager = new CombustionManager();
    try {
      $param = 1;
      $manager->calculateOverall($param);
      $this->fail("Should throw exception about bad param type");
    } catch (InvalidArgumentException $e) {
      $this->is($e->getCode(), 1, "Proper param checking");
    }
  }

  /**
   * willFailOnDifferentTypesInCollection 
   * 
   * @access public
   * @return void
   */
  public function willFailOnDifferentTypesInCollection()
  {
    $manager = new CombustionManager();
    try {
      $bills = array(new FuelBill(), new ShopBill);
      $manager->calculateOverall($bills);
      $this->fail("Shold throw exception abou different types of shop bills");
    } catch (InvalidArgumentException $e) {
      $this->is($e->getCode(), 2, "Properly handles different types of shop bills");
    }
  }

  /**
   * willFailOnBillsOthersThanFuelBill 
   * 
   * @access public
   * @return void
   */
  public function willFailOnBillsOthersThanFuelBill()
  {
    $manager = new CombustionManager();
    try {
      $bills = array(new ShopBill(), new ShopBill());
      $manager->calculateOverall($bills);
      $this->fail("Should throw an exception due to only ShopBills in collection");
    } catch (DomainException $e) {
      $this->is($e->getCode(), 4, "Properly handles non FuelBills");
    }
  }

  /**
   * willReturnZeroForEmptyArray 
   * 
   * @access public
   * @return void
   */
  public function willReturnZeroForEmptyArray()
  {
    $manager = new CombustionManager();
    $bills = array();
    $this->is($manager->calculateOverall($bills), 0, "Manager calculates 0 combustion for empty array");
  }
}

new CombustionManagerTest();
