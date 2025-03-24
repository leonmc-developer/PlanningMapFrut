<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;
use App\Models\TerrenoModel;
class Terreno extends BaseController
{
    public function index()
	{
        $output=array();
        $output['section']="terreno";
        $this->_viewOutput('details-terreno', (array)$output);
	}
}
