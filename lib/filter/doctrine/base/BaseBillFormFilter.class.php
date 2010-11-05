<?php

/**
 * Bill filter form base class.
 *
 * @package    CarCalc
 * @subpackage filter
 * @author     Wojciech Sznapka
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBillFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'date'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'place'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'totalPrice'           => new sfWidgetFormFilterInput(),
      'carId'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'userId'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'                 => new sfWidgetFormFilterInput(),
      'fuelTypeId'           => new sfWidgetFormFilterInput(),
      'liters'               => new sfWidgetFormFilterInput(),
      'priceForLiter'        => new sfWidgetFormFilterInput(),
      'distanceTillLastBill' => new sfWidgetFormFilterInput(),
      'description'          => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'date'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'place'                => new sfValidatorPass(array('required' => false)),
      'totalPrice'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'carId'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'userId'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type'                 => new sfValidatorPass(array('required' => false)),
      'fuelTypeId'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'liters'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'priceForLiter'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'distanceTillLastBill' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'description'          => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('bill_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bill';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'date'                 => 'Date',
      'place'                => 'Text',
      'totalPrice'           => 'Number',
      'carId'                => 'Number',
      'userId'               => 'Number',
      'type'                 => 'Text',
      'fuelTypeId'           => 'Number',
      'liters'               => 'Number',
      'priceForLiter'        => 'Number',
      'distanceTillLastBill' => 'Number',
      'description'          => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
