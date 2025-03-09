<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Terrenos extends BaseController
{
    public function index()
	{
	    $crud = new GroceryCrud();

	    $crud->setTable('terrenos');
        $crud->fieldType('color', 'color');

	    $output = $crud->render();

		return view('welcome_message', (array)$output);
	}

}
