<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/My_Model.php');
/**
* 
*/
class Event_Model extends My_Model
{	
	protected $table = 'events';
    protected $fields = [
        'events.id as event_id',
        'events.name',
        'events.start_date',
        'events.end_date',
        'events.noof_people',
        'venues.id as venue_id',
        'venues.name as venue_name'
    ];
	
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

    public function get_join_where($join_table, $where, $condition)
    {
        return $this->get_join($join_table, $this->fields, $where, $condition);
    }








}