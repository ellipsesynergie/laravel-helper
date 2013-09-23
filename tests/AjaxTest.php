<?php namespace EllipseSynergie\LaravelHelper;

use EllipseSynergie\LaravelHelper\Helper\Ajax;

/**
 * Test case for ajax
 */
class AjaxTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->ajax = new Ajax();
	}
	
	public function testAjaxResponse()
	{
		$response = $this->ajax->response(array(
			'success' => true,
			'message' => 'Foo',
			'data' => 'Bar',
			'content' => '<h1>Success!</h1>'
		));
		
		$this->assertEquals(array(
			'success' => true,
			'message' => 'Foo',
			'errors' => array(),
			'data' => 'Bar',
			'content' => '<h1>Success!</h1>',
			'redirect' => ''
		), $response);
	}
}