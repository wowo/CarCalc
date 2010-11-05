<?php

/**
 * Car
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    CarCalc
 * @subpackage model
 * @author     Wojciech Sznapka
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Car extends BaseCar
{
  public function getFuelCombustionOverall(FuelType $fuelType)
  {
    $bills = $this->getQueryForFindingFuelBills($fuelType)->execute();
    $combustionManager = new CombustionManager();
    return $combustionManager->calculateOverall($bills);
  }

  /**
   * findAllBillings 
   * 
   * @param FuelType $fuelType 
   * @access public
   * @return void
   */
  public function findAllFuelBillings(FuelType $fuelType)
  {
    return $this->getQueryForFindingFuelBills($fuelType)->execute();
  }

  /**
   * getQueryForFindingFuelBills 
   * 
   * @param FuelType $fuelType 
   * @access protected
   * @return void
   */
  protected function getQueryForFindingFuelBills(FuelType $fuelType)
  {
    $dql = Doctrine_Query::create()
      ->from("FuelBill fb")
      ->innerJoin("fb.Car c")
      ->addWhere("c.id = ?", $this->id)
      ->addWhere("fb.fuelTypeId = ?", $fuelType->id);
    return $dql;
  }
}
