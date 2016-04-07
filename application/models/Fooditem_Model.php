<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/My_Model.php');
/**
* 
*/
class Fooditem_Model extends My_Model
{	
	protected $table = 'food_items';
	
	function __construct()
	{
		 parent::__construct();
	}
    public function insert_item($data)
	{
		return $this->insert($data);
	}
	public function delete_item($id)
	{
		return $this->drop(['id' => $id]);
	}
	public function view_item()
	{
		return $this->get_all();
	}





}
