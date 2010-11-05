<?php

/**
 * FuelBill form base class.
 *
 * @method FuelBill getObject() Returns the current form's model object
 *
 * @package    CarCalc
 * @subpackage form
 * @author     Wojciech Sznapka
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFuelBillForm extends BillForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('fuel_bill[%s]');
  }

  public function getModelName()
  {
    return 'FuelBill';
  }

}
