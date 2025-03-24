<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;
use App\Models\TerrenoModel;
class Actividades extends BaseController
{
    public function index()
	{
        $output=array();
        $output['section']="actividades";
        $this->_viewOutput('planificacion-actividades', (array)$output);
	}
}
