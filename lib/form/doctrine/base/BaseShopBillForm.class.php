<?php

/**
 * ShopBill form base class.
 *
 * @method ShopBill getObject() Returns the current form's model object
 *
 * @package    CarCalc
 * @subpackage form
 * @author     Wojciech Sznapka
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShopBillForm extends BillForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('shop_bill[%s]');
  }

  public function getModelName()
  {
    return 'ShopBill';
  }

}
