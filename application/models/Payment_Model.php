<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/My_Model.php');
/**
* 
*/
class Payment_Model extends My_Model
{	
	protected $table = 'payments';
	
	function __construct()
	{
		 parent::__construct();
	}
    public function insert_pay($data)
	{
		return $this->insert($data);
	}
	public function delete_pay($id)
	{
		return $this->drop(['id' => $id]);
	}
	public function view()
	{
		return $this->get_all();
	}





}