<?php




require ("../vendor/autoload.php");


$router = new Router();

$routes = array(
	'/' => '',

	'/login' => "LoginController:logaUsuario@post",
	'/loginfb' => "LoginController:logaUsuarioFB@post",

	'/cadastrauser'=> "CadastroController:cadastraUsuario@post",

	'/demo' => array(
		"get" => "Main:test2",
		"post" => "Main:test3"
	),

    '/p'=>"Pessoa:index",
);

$router->addRoutes($routes);

$router->set404Handler("Main:notFound");

$router->run();

