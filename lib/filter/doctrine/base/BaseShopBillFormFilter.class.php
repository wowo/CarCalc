<?php

/**
 * ShopBill filter form base class.
 *
 * @package    CarCalc
 * @subpackage filter
 * @author     Wojciech Sznapka
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShopBillFormFilter extends BillFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('shop_bill_filters[%s]');
  }

  public function getModelName()
  {
    return 'ShopBill';
  }
}
