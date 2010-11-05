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
class CarTest extends TestSuite
{
  protected $fuelType = null;

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
    $this->fuelType = Doctrine::getTable("FuelType")->findOneByName("Gaz");
    if (!($this->fuelType instanceof FuelType)) {
      $this->fail("FuelType not found, probably because of broken fixtures ");
    }

    $this->fuelCombustionForCarWithoutBillsTest();
    $this->findAllFuelBillingsTest();
    $this->fuelCombustionForCarWithBillsTest();
  }

  /**
   * fuelCombustionForCarWithoutBillsTest 
   * 
   * @access public
   * @return void
   */
  public function fuelCombustionForCarWithoutBillsTest()
  {
    $car = $this->_getCar("Corsa II");
    $this->is($car->getFuelCombustionOverall($this->fuelType), 0, "Combustion for car without bills is 0");
  }

  /**
   * fuelCombustionForCarWithBillsTest 
   * 
   * @access public
   * @return void
   */
  public function fuelCombustionForCarWithBillsTest()
  {
    $car = $this->_getCar("Astra II");
    $this->is($car->getFuelCombustionOverall($this->fuelType), 9.23, "Combustion is 9.23, as we calculated in spreadsheet");
  }

  public function findAllFuelBillingsTest()
  {
    $car = $this->_getCar("Astra II");
    $this->is(count($car->findAllFuelBillings($this->fuelType)), 5, "We've got 5 fuel bills for LPG");
  }

  /**
   * _getCarWithoutBills 
   * 
   * @access protected
   * @return void
   */
  protected function _getCar($model)
  {
    $corsa = Doctrine::getTable("Car")->findOneByModel($model);
    if (!($corsa instanceof Car)) {
      $this->fail("Car not found, probably because of broken fixtures ");
    }
    return $corsa;
  }
}

new CarTest();
