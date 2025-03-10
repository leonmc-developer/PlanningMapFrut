<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;
use App\Models\TerrenoModel;
class Maps extends BaseController
{
    public function index()
	{
        $output=array();
        $model = new TerrenoModel();  // Crear una instancia del modelo
        $terreno = $model->obtenerTerrenoPorId(1);
        $output['poligonoCoords']=$terreno['coordenadas'];
        $this->_viewOutput('maps', (array)$output);
	}
    private function _viewOutput($vista=null,$output = null) {
        echo view('template/tp_header',$output);
        echo view($vista, $output);
        echo view('template/tp_footer',$output);
    }

}
