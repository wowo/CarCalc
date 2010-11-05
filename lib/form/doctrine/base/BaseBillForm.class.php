<?php

/**
 * Bill form base class.
 *
 * @method Bill getObject() Returns the current form's model object
 *
 * @package    CarCalc
 * @subpackage form
 * @author     Wojciech Sznapka
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBillForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'date'                 => new sfWidgetFormDateTime(),
      'place'                => new sfWidgetFormInputText(),
      'totalPrice'           => new sfWidgetFormInputText(),
      'carId'                => new sfWidgetFormInputText(),
      'userId'               => new sfWidgetFormInputText(),
      'type'                 => new sfWidgetFormInputText(),
      'fuelTypeId'           => new sfWidgetFormInputText(),
      'liters'               => new sfWidgetFormInputText(),
      'priceForLiter'        => new sfWidgetFormInputText(),
      'distanceTillLastBill' => new sfWidgetFormInputText(),
      'description'          => new sfWidgetFormTextarea(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'date'                 => new sfValidatorDateTime(),
      'place'                => new sfValidatorString(array('max_length' => 255)),
      'totalPrice'           => new sfValidatorNumber(array('required' => false)),
      'carId'                => new sfValidatorInteger(),
      'userId'               => new sfValidatorInteger(),
      'type'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fuelTypeId'           => new sfValidatorInteger(array('required' => false)),
      'liters'               => new sfValidatorNumber(array('required' => false)),
      'priceForLiter'        => new sfValidatorNumber(array('required' => false)),
      'distanceTillLastBill' => new sfValidatorNumber(array('required' => false)),
      'description'          => new sfValidatorString(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('bill[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bill';
  }

}
