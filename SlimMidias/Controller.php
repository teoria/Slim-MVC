<?php

Class Controller extends \Slim\Slim
{
	protected $data;

	public function __construct()
	{

        $settings = array(
            'view' => new \Slim\Views\Twig(),
            'debug' => false,
            'templates.path' => '../views'

        );

		parent::__construct($settings);
	}

	public function render($name, $data = array(), $status = null)
	{
		if (strpos($name, ".php") === false) {
			$name = $name . ".php";
		}
		parent::render($name, $data, $status);
	}	
}

