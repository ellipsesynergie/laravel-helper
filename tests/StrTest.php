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
	
	public function testReplaceAccent()
	{
		$result = $this->string->replaceAccents('Élémentâle');
		$this->assertEquals('elementale', $result);
	}
}