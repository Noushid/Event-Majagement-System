<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/My_Model.php');
/**
* 
*/
class Event_Model extends My_Model
{	
	protected $table = 'events';
	
	function __construct()
	{
		 parent::__construct();
	}
    public function insert_event($data)
	{
		return $this->insert($data);
	}
	public function delete_event($id)
	{
		return $this->drop(['id' => $id]);
	}
	public function view_event()
	{
		return $this->get_all();
	}





}