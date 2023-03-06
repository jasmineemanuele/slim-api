<?php

namespace App\Controllers;

use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use function PHPSTORM_META\exitPoint;

class User {


    public function getRegister(Request $request, Response $response){
        
        $user  = new \App\Models\Users();
        $renderer = new PhpRenderer(__DIR__."\Views");
        return $renderer->render($response, "register.php");
    }


    public function postRegister(Request $request, Response $response){

        $User_model = new \App\Models\Users();
        $params = (array)$request->getParsedBody();
        $email = $params['email'];
        $password = md5($params['password']);
        $result = $User_model->registerUsers($email,$password);
        
        header('Location: http://localhost:8080/registrazione');
        exit();
        //return $response->withHeader('Location', 'http://localhost:8080/registrazione');

    }



    public function getLogout(Request $request, Response $response)
    {
        session_start();
        unset($_SESSION['log']);
        header('Location: http://localhost:8080/login');
        exit();            

    }
    public function getLogin(Request $request, Response $response){
        session_start();
        if($_SESSION['log']){
            header('Location: http://localhost:8080/home');
            exit();            
        }
        $renderer = new PhpRenderer(__DIR__."\Views");
        return $renderer->render($response, "login.php");

    }

    public function postLogin(Request $request, Response $response){
        session_start();
        $user  = new \App\Models\Users();
        $params = (array)$request->getParsedBody();
        $email = $params['uname'];
        $password = md5($params['psw']);
        $result = $user->checkUser($email, $password);
        if($result){
            $_SESSION['log'] = true;
            //reinderizza la pagina exit() fa parte di header;
            header('Location: http://localhost:8080/home');
            exit();
        }
        else
        {
            //reinderizza la pagina exit() fa parte di header;
            header('Location: http://localhost:8080/login');
            exit();            
        }


        //altro metodo di reindirizzamento
        // $response->getBody()->write("<script>location.replace('http://localhost:8080/citta')</script>");
        // return($response);
        
         
    }


}