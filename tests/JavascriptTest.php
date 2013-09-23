<?php namespace EllipseSynergie\LaravelHelper;

use EllipseSynergie\LaravelHelper\Helper\Javascript;

/**
 * Test case for javascript
 */
class JavascriptTest extends \PHPUnit_Framework_TestCase {
	
	public function setUp()
	{
		$this->javascript = new Javascript('EllipseSynergie');	
	}
	public function testAddModule()
	{	
		$this->javascript->addModule('foo', array('options-1' => true));
		
		$this->assertEquals(array('foo' => array('options' => array('options-1' => true), 'controllers' => array())), $this->javascript->getModules());
	}
	
	public function testAddModuleWithControllers()
	{
		$controllers = array('bar' => array('option-1' => true));
		
		$this->javascript->addModule('foo', array('options-1' => true), $controllers);
		$this->assertEquals(array('foo' => array('options' => array('options-1' => true), 'controllers' => $controllers)), $this->javascript->getModules());
	}
	
	public function testAddModuleWithoutOptions()
	{
		$this->javascript->addModule('foo');
		
		$this->assertEquals(array('foo' => array('options' => array(), 'controllers' => array())), $this->javascript->getModules());
	}
	
	public function testAddModuleWithControllersWithoutOptions()
	{
		$controllers = array('bar');
	
		$this->javascript->addModule('foo', array('options-1' => true), $controllers);
		$this->assertEquals(array('foo' => array('options' => array('options-1' => true), 'controllers' => $controllers)), $this->javascript->getModules());
	}
	
	public function testAddController()
	{
		
		$this->javascript->addModule('foo');
		$this->javascript->addController('foo', 'bar', array('options-1' => true));
		
		$this->assertEquals(array('foo' => array('options' => array(), 'controllers' => array('bar' => array('options-1' => true)))), $this->javascript->getModules());
	}
}