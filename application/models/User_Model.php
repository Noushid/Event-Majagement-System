<?php 
/**
* 
*/
require_once(APPPATH.'core/My_Model.php');
class User_Model extends My_Model
{
	
	protected $table = 'users';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_where($where)
	{
		return $this->get($where);		
	}
}

