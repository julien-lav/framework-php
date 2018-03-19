<?php 
namespace Framework; 
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App {

	public function run(ServerRequestInterface $request): ResponseInterface {
		/*
		$uri = $_SERVER['REQUEST_URI'];*/
		$uri = $request->getUri()->getPath();
		if(!empty($uri) && $uri[-1] === "/") {
			$response = (new Response())
				->withStatus(301)
				->withHeader('Location: ' . substr($uri, 0, -1));
			return $response;
		}
		$response = (new Response())
			->getBody()->write('Salut');
		return $response;
		// echo 'Salut';
	}
}
