<?php

namespace App\Controllers;
use App\Libraries\GroceryCrud;
class Home extends BaseController
{
    public function index()
    {
        //return view('welcome_message');
        $output=array();
        $this->_viewOutput('dashboard', (array)$output);
    }
    public function dashboard()
    {
        $output=array();
        $this->_viewOutput('dashboard', (array)$output);
    }
    public function informacion()
    {
        $output=array();
        $this->_viewOutput('tables', (array)$output);
    }
    public function login()
    {
        return view('sign-in');
    }
    public function maps()
    {
        return view('maps');
    }
    public function terrenos_management()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('terrenos');
        $crud->fieldType('color', 'color');
	    $output = $crud->render();

		return $this->_viewOutput("welcome_message",$output);
	}
    private function _viewOutput($vista=null,$output = null) {
        echo view('template/tp_header',$output);
        echo view($vista, $output);
        echo view('template/tp_footer',$output);
    }
}
