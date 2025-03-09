<?php

namespace App\Controllers;
use App\Libraries\GroceryCrud;
class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function terrenos_management()
	{
	    $crud = new GroceryCrud();

	    $crud->setTable('terrenos');
        $crud->fieldType('color', 'color');

	    $output = $crud->render();

		return $this->_viewOutput($output);
	}
    private function _viewOutput($output = null) {
        return view('welcome_message', (array)$output);
    }
}
