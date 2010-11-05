<?php

/**
 * Car2User filter form base class.
 *
 * @package    CarCalc
 * @subpackage filter
 * @author     Wojciech Sznapka
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCar2UserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'carId'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'userId' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Car'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'carId'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'userId' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Car'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('car2_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Car2User';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'carId'  => 'ForeignKey',
      'userId' => 'ForeignKey',
    );
  }
}
