<?php namespace EllipseSynergie\LaravelHelper;

use EllipseSynergie\LaravelHelper\Helper\Assets;

/**
 * Test case for assets
 */
class AssesTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->assets = new Assets(array(), 'http://localhost/', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR);
	}
	
	public function testRenderCss()
	{
		$file = 'test.css';
		$this->assets->addCss($file);
		$this->assertEquals('<link rel="stylesheet" href="http://localhost/test.css?v=1379939729" type="text/css">', $this->assets->renderCss());
	}	
	
	public function testRenderJs()
	{
		$file = 'test.js';
		$this->assets->addJs($file);
		$this->assertEquals('<script src="http://localhost/test.js?v=1379939734"></script>', $this->assets->renderJs());
	}	
	
	public function testRenderCssEmpty()
	{
		$this->assertNull( $this->assets->renderCss());
	}	
	
	public function testRenderJsEmpty()
	{
		$this->assertNull( $this->assets->renderJs());
	}		
	
	public function testResetCollection()
	{
		$file = 'test.js';
		$this->assets->addJs($file);
		$this->assets->reset();
		$this->assertNull( $this->assets->renderCss());
		$this->assertNull( $this->assets->renderJs());
	}	
}