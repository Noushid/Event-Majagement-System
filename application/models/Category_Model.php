<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/My_Model.php');
/**
* 
*/
class Category_Model extends My_Model
{	
	protected $table = 'categories';
	
	function __construct()
	{
		 parent::__construct();
	}

    public function insert_cat($data)
	{
		return $this->insert($data);
	}

	public function delete_cat($id)
	{
		return $this->drop(['id' => $id]);
	}


	public function view()
	{
		return $this->get_all();
	}


}




























 ?>