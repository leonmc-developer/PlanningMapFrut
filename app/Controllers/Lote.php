<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;
use App\Models\TerrenoModel;
class Lote extends BaseController
{
    public function index()
	{
        $output=array();
        $this->_viewOutput('details-lote', (array)$output);
	}
  
}
