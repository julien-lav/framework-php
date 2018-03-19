<?php

namespace Tests\Framework;

use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase {

	public function testRedirectTrailingSlash() {
		$app = new App();
		/* 
		$_SERVER['REQUEST_URI'] = "/jkdjksdk/";
		$app->run();
		$this->assertContains('Location: jkdjksdk', headers_list());
		*/
		/*
		$request = new Request('/jkdjksdk/'); 
		*/
		$request = new ServerRequest('GET', '/demoslash/');
		$reponse = $app->run($request);
		$this->assertContains('/demoslash', $response->getHeader('Location'));
		$this->assertEquals(301, $response->getStatusCode());
	}
}

