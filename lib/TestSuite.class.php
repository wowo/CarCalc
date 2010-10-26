<?php

/**
 * TestSuite 
 * 
 * @uses lime
 * @uses _test
 * @abstract
 * @package 
 * @version $id$
 * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
 * @license 
 */
abstract class TestSuite extends lime_test
{
  /**
   * __construct 
   *  
   * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
   * @access public
   * 
   * @param  mixed $testCount 
   * @return void
   */
  public function __construct($testCount = null)
  {
    parent::__construct($testCount , new lime_output_color());
    $this->run();
  }

  /**
   * run 
   *  
   * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
   * @abstract
   * @access public
   * 
   * @return void
   */
  public abstract function run();

  /**
   * Checks if every object in collection (array) is given type.
   * In fact it runs isa_ok on every element of the collection
   *  
   * @author Wojciech Sznapka <wojciech.sznapka@xsolve.pl> 
   * @final
   * @access public
   * 
   * @param  array $collection 
   * @param  mixed $type 
   * @param  mixed $msg 
   * @return void
   */
  public final function collection_isa_ok($collection, $type, $msg = null)
  {
    $validType = true;
    foreach ($collection as $object) {
      $validType &= ($object instanceof $type);
    }
    $this->ok($validType, $msg);
  }
}
