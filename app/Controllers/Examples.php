<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Examples extends BaseController
{
	public function terrenos()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('terrenos');
	    $output = $crud->render();
	    $this->_exampleOutput($output);
	}
    public function sectores()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('sectores');
	    $output = $crud->render();
		return $this->_exampleOutput($output);
	}
    public function hileras()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('hileras');
	    $output = $crud->render();
		return $this->_exampleOutput($output);
	}
    public function plantas()
	{
	    $crud = new GroceryCrud();
	    $crud->setTable('plantas');
	    $output = $crud->render();
		return $this->_exampleOutput($output);
	}
    

	public function orders_management() {
        $crud = new GroceryCrud();

        $crud->setRelation('customerNumber','customers','{contactLastName} {contactFirstName}');
        $crud->displayAs('customerNumber','Customer');
        $crud->setTable('orders');
        $crud->setSubject('Order');
        $crud->unsetAdd();
        $crud->unsetDelete();

        $output = $crud->render();

        return $this->_exampleOutput($output);
    }

    public function offices_management () {
        $crud = new GroceryCrud();

        $crud->setTheme('datatables');
        $crud->setTable('offices');
        $crud->setSubject('Office');
        $crud->requiredFields(['city']);
        $crud->columns(['city','country','phone','addressLine1','postalCode']);
        $crud->setRead();

        $output = $crud->render();

        return $this->_exampleOutput($output);
    }

    public function products_management() {
        $crud = new GroceryCrud();

        $crud->setTable('products');
        $crud->setSubject('Product');
        $crud->unsetColumns(['productDescription']);
        $crud->callbackColumn('buyPrice', function ($value) {
            return $value.' &euro;';
        });

        $output = $crud->render();

        return $this->_exampleOutput($output);
    }

    public function employees_management()
    {
        $crud = new GroceryCrud();

        $crud->setTheme('datatables');
        $crud->setTable('employees');
        $crud->setRelation('officeCode','offices','city');
        $crud->displayAs('officeCode','Office City');
        $crud->setSubject('Employee');

        $crud->requiredFields(['lastName']);

        $output = $crud->render();

        return $this->_exampleOutput($output);
    }

    public function film_management()
    {
        $crud = new GroceryCrud();

        $crud->setTable('film');
        $crud->setRelationNtoN('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname');
        $crud->setRelationNtoN('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
        $crud->unsetColumns(['special_features','description','actors']);

        $crud->fields(['title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features']);

        $output = $crud->render();

        return $this->_exampleOutput($output);
    }


    private function _exampleOutput($output = null) {
        echo view('template/tp_header',(array)$output);
       

         echo view('template/tp_crud', (array)$output);
        echo view('template/tp_footer',(array)$output);
    }
    


}
