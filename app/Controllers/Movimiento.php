<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;
use App\Models\TerrenoModel;
class Movimiento extends BaseController
{
    public function index()
	{
        $output=array();
        $output['section']="movimientos";
        $this->_viewOutput('movimientos', (array)$output);
	}
}
