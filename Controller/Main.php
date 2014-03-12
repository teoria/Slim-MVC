<?php



Class Main extends Controller
{
    public function index()
	{

		$this->render(
                    "test",
                    array("title" => "Saúde na Copa", "name" => "Home")
                        );
		//$this->render("test", array("title" => $this->data->message, "name" => "Home"));
	}


	
	public function notFound()
	{
		$this->render("error", array(), 404);
	}
}

