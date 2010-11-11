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
  protected $_fuelType = null;

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
    $this->_fuelType = Doctrine::getTable("FuelType")->findOneByName("Gaz");
    if (!($this->_fuelType instanceof FuelType)) {
      $this->fail("FuelType not found, probably because of broken fixtures ");
    }

    $this->fuelCombustionForCarWithoutBillsTest();
    $this->findAllFuelBillingsTest();
    $this->fuelCombustionForCarWithBillsTest();
    $this->fuelCombustionForCarWithOneBill();
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
    $this->is($car->getFuelCombustionOverall($this->_fuelType), 0, "Combustion for car without bills is 0");
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
    $this->is($car->getFuelCombustionOverall($this->_fuelType), 9.23, "Combustion is 9.23, as we calculated in spreadsheet");
  }

  public function fuelCombustionForCarWithOneBill()
  {
    $car = $this->_getCar("Astra II");
    try {
      $petrol = Doctrine::getTable("FuelType")->findOneByName("Benzyna 95");
      if (!($petrol instanceof FuelType)) {
        $this->fail("We didn'y retrieved petrol PB95");
      }
      $car->getFuelCombustionOverall($petrol);
      $this->fail("Should fail, because there should be only one Petrol bill, and there's nothing to calculate");
    } catch (DomainException $e) {
      $this->pass("Method thrown an exception for checking with one bill");
    }
  }

  /**
   * findAllFuelBillingsTest 
   * 
   * @access public
   * @return void
   */
  public function findAllFuelBillingsTest()
  {
    $car = $this->_getCar("Astra II");
    $this->is(count($car->findAllFuelBillings($this->_fuelType)), 5, "We've got 5 fuel bills for LPG");
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
