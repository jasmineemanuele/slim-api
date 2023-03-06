<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Home
{
    public function index(Request $request, Response $response)
    {
        $response->getBody()->write('Index Home');

        return $response;
    }

    public function welcome(Request $request, Response $response)
    {
        $response->getBody()->write('welcome Home');

        return $response;
    }

	public function getUser(Request $request, Response $response)
	{
		$users  = new \App\Models\Users();
		$result = $users->getUsers();
		$response->getBody()->write(json_encode($result));
		return $response;
	}
}