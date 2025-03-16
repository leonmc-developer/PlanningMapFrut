<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;
use App\Models\TerrenoModel;
class Terreno extends BaseController
{
    public function index()
	{
        $output=array();
        $this->_viewOutput('details-terreno', (array)$output);
	}
    private function _viewOutput($vista=null,$output = null) {
        echo view('template/tp_header',$output);
        echo view($vista, $output);
        echo view('template/tp_footer',$output);
    }

}
