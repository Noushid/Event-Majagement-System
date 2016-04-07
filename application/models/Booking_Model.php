<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/My_Model.php');
/**
* 
*/
class Booking_Model extends My_Model
{	
	protected $table = 'booking';
	
	function __construct()
	{
		 parent::__construct();
	}
    public function insert_booking($data)
	{
		return $this->insert($data);
	}
	public function delete_booking($id)
	{
		return $this->drop(['id' => $id]);
	}
	public function view_booking()
	{
		return $this->get_all();
	}





}