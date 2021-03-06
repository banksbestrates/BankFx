<?php
 
use DrewM\Drip\Drip;
use DrewM\Drip\Dataset;
 
class DatasetTest extends PHPUnit_Framework_TestCase 
{

	public function testJsonSerialization()
	{
		$Dataset = new Dataset('subscribers', [
					'email' => 'postmaster@example.com',
				]);

		$result = json_encode($Dataset);

		$expected = json_encode([
			'subscribers' => [
    			[
					'email' => 'postmaster@example.com',
				]
			]
		]);

		$this->assertEquals($expected, $result);

	}


}