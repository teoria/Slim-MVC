<?php



Class MainController extends Controller
{
    public function index()
	{

		$this->render(
                    "test",
                    array("title" => "Home", "name" => "Home")
                        );

	}

    public function flash()
    {

        $this->render(
            "test",
            array("title" => "Home", "name" => "Home")
        );

    }




    public function notFound()
	{
		$this->render("error", array(), 404);
	}
}

