<?php

/**
 * CombustionManager 
 * 
 * @package 
 * @version $id$
 * @copyright 
 * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
 * @license 
 */
class CombustionManager
{
  public function calculateOverall($bills)
  {
    if (!($bills instanceof Traversable) && !is_array($bills)) {
      throw new InvalidArgumentException("Param should be collection (or at least array)", 1);
    }

    if (count($bills) > 0) {
      $billsTypes = $this->_getBillsTypes($bills);
      if (count($billsTypes) > 1) {
        throw new InvalidArgumentException("There bills of different type: " . implode(",", $billsTypes), 2);
      }

      $firstBill = $bills[0];
      if (!($firstBill instanceof FuelBill)) {
        throw new DomainException("Wrong type of bills passed to calculate combustion", 4);
      }

      $prevBillPointer = null;
      $combustions = array();
      foreach ($bills as $bill) {
        if ($prevBillPointer != null) {
          $combustions[] = ($prevBillPointer->liters * 100) / $bill->distanceTillLastBill;
        }
        $prevBillPointer = $bill;
      }
      return $this->_round(array_sum($combustions) / count($combustions));
    } else {
      return 0;
    }
  }

  /**
   * getBillsTypes 
   * 
   * @param array $bills 
   * @access protected
   * @return void
   */
  protected function _getBillsTypes($bills)
  {
    $types = array();
    foreach ($bills as $bill) {
      $types[] = get_class($bill);
    }
    return array_unique($types);
  }

  /**
   * _round 
   * 
   * @param mixed $value 
   * @access protected
   * @return double
   */
  protected function _round($value)
  {
    return round($value, 2);
  }
}
