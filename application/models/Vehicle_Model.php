<?php


defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/My_Model.php');
/**
* 
*/
class Vehicle_Model extends My_Model
{
	public $table = 'vehicles';
	
	function __construct()
	{
		parent::__construct();
	}

    public function insert_vehice($data)
	{
		return $this->insert($data);
	}
	public function delete_vehicle($id)
	{
		return $this->drop(['id' => $id]);
	}
	public function view()
	{
		return $this->get_all();
	}

	
}








































