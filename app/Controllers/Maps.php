<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;
use App\Models\TerrenoModel;
class Maps extends BaseController
{
    public function index()
	{
        $output=array();
        $output['section']="maps";
        $model = new TerrenoModel();  // Crear una instancia del modelo
        $terreno = $model->obtenerTerrenoPorId(1);
        $output['poligonoCoords']=$terreno['coordenadas'];
        $this->_viewOutput('maps', (array)$output);
	}
}
