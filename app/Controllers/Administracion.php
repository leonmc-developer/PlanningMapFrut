<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;
use App\Models\PlantaModel;

class Administracion extends BaseController
{
    public function index()
	{
        $crud = new GroceryCrud();
	    $crud->setTable('customers');
	    $output = $crud->render();
        $this->_viewOutput('administracion', (array)$output);
	}
    private function _viewOutput($vista=null,$output = null) {
        echo view('template/tp_header',$output);
        echo view($vista, $output);
        echo view('template/tp_footer',$output);
    }

}
