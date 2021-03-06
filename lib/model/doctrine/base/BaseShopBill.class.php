<?php

/**
 * BaseShopBill
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Car $Car
 * @property User $User
 * 
 * @method Car      getCar()  Returns the current record's "Car" value
 * @method User     getUser() Returns the current record's "User" value
 * @method ShopBill setCar()  Sets the current record's "Car" value
 * @method ShopBill setUser() Sets the current record's "User" value
 * 
 * @package    CarCalc
 * @subpackage model
 * @author     Wojciech Sznapka
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseShopBill extends Bill
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Car', array(
             'local' => 'carId',
             'foreign' => 'id'));

        $this->hasOne('User', array(
             'local' => 'userId',
             'foreign' => 'id'));
    }
}