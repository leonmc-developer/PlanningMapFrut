<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Administracion extends BaseController
{
    public function index()
	{
        $output=array();
        echo "Ingresa";
        $this->_viewOutput('administracion', (array)$output);
	}
    private function _viewOutput($vista=null,$output = null) {
        echo view('template/tp_header',$output);
        //echo view($vista, $output);
        echo view('template/tp_footer',$output);
    }

}
