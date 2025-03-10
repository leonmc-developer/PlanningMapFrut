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
		$output->output .= '<script type="text/javascript">
            $(document).ready(function() {
                // Cambiar el tipo del input "color" a "color" para mostrar el selector de color
                $("input[name=color]").attr("type", "color");
            });
        </script>';

		return view('welcome_message', (array)$output);
	}

}
