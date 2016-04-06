<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/My_Model.php');
/**
* 
*/
class Client_Model extends My_Model
{	
	protected $table = 'clients';
	
	function __construct()
	{
		 parent::__construct();
	}
    public function insert_cli($data)
	{
		return $this->insert($data);
	}
	public function delete_cli($id)
	{
		return $this->drop(['id' => $id]);
	}
	public function view()
	{
		return $this->get_all();
	}





}
