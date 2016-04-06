<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/My_Model.php');
/**
* 
*/
class Venue_Model extends My_Model
{	
	protected $table = 'venues';
	
	function __construct()
	{
		 parent::__construct();
	}
    public function insert_ven($data)
	{
		return $this->insert($data);
	}
	public function delete_ven($id)
	{
		return $this->drop(['id' => $id]);
	}
	public function view()
	{
		return $this->get_all();
	}





}
