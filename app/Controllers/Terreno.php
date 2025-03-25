<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;
use App\Models\TerrenoModel;
class Terreno extends BaseController
{
    public function index()
	{
        $output=array();
        $output['section']="terreno";
        $terreno=new TerrenoModel();
        $user = $this->ionAuth->user()->row();
        $output['terreno']=$terreno->obtenerTerrenoPorId($user->terreno_id);
        $this->_viewOutput('details-terreno', (array)$output);
	}
}
