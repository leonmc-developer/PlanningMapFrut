<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;
use App\Models\TerrenoModel;
class Reportes extends BaseController
{
    public function index()
	{
        $output=array();
        $output['section']="reportes";
        $this->_viewOutput('reportes', (array)$output);
	}
}
