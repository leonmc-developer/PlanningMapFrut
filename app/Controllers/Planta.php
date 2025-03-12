<?php
namespace App\Controllers;
use App\Models\PlantaModel;
use CodeIgniter\Controller;

class Planta extends Controller
{
    public function index()
    {
        $model = new PlantaModel();
        $data['plantas'] = $model->findAll();  // Obtener todas las plantas
        $this->_viewOutput('administracion/plantas_view', $data);
    }
    private function _viewOutput($vista=null,$output = null) {
        echo view('template/tp_header',$output);
        echo view($vista, $output);
        echo view('template/tp_footer',$output);
    }
    public function create()
    {
        $output=array();
         $this->_viewOutput('administracion/planta_create', $output);
    }

    public function store()
    {
        $model = new PlantaModel();

        $data = [
            'nombre'      => $this->request->getVar('nombre'),
            'variedad'    => $this->request->getVar('variedad'),
            'descripcion' => $this->request->getVar('descripcion')
        ];

        if ($model->save($data)) {
            return redirect()->to('/plantas');
        } else {
            return redirect()->back()->withInput();
        }
    }
    public function store_ajax()
    {
        $model = new PlantaModel();
        $data = [
            'nombre'      => $this->request->getVar('nombre'),
            'variedad'    => $this->request->getVar('variedad'),
            'descripcion' => $this->request->getVar('descripcion')
        ];
        if ($model->save($data)) {
            $response = array(
                'success' => true,
                'message' => 'Formulario enviado correctamente.'
            );
            header('Content-Type: application/json');
            echo json_encode($response); 
        } else {
            $response = array(
                'success' => false,
                'message' => 'Error al guardar Formulario '
            );
            header('Content-Type: application/json');
            echo json_encode($response); 
        }
    }

    public function edit($id)
    {
        $model = new PlantaModel();
        $data['planta'] = $model->find($id);
         $this->_viewOutput('administracion/planta_edit', $data);
    }

    public function update($id)
    {
        $model = new PlantaModel();

        $data = [
            'nombre'      => $this->request->getVar('nombre'),
            'variedad'    => $this->request->getVar('variedad'),
            'descripcion' => $this->request->getVar('descripcion')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/plantas');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $model = new PlantaModel();
        $model->delete($id);
        return redirect()->to('/plantas');
    }
}
