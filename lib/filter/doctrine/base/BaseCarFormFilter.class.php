<?php

/**
 * Car filter form base class.
 *
 * @package    CarCalc
 * @subpackage filter
 * @author     Wojciech Sznapka
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCarFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'model'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'brand'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'year'       => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'users_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'User')),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'model'      => new sfValidatorPass(array('required' => false)),
      'brand'      => new sfValidatorPass(array('required' => false)),
      'year'       => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'users_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'User', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('car_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addUsersListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.Car2User Car2User')
      ->andWhereIn('Car2User.carId', $values)
    ;
  }

  public function getModelName()
  {
    return 'Car';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'model'      => 'Text',
      'brand'      => 'Text',
      'year'       => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'users_list' => 'ManyKey',
    );
  }
}
