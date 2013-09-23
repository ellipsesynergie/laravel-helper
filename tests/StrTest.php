<?php namespace EllipseSynergie\LaravelHelper;

use EllipseSynergie\LaravelHelper\Helper\Str;

/**
 * Test case for string
 */
class StrTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->string = new Str('UTF-8');
	}
	
	public function testEntities()
	{
		$result = $this->string->entities('<div>test</div>');
		$this->assertEquals('&lt;div&gt;test&lt;/div&gt;', $result);
	}
	
	public function testReplaceAccent()
	{
		$result = $this->string->replaceAccents('Élémentâle');
		$this->assertEquals('elementale', $result);
	}
}