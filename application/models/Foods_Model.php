<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/My_Model.php');
/**
 *
 */
class Foods_Model extends My_Model
{
    protected $table = 'foods';
    protected $fields = [
        'foods.id as food_id',
        'foods.type',
        'foods.quantity',
        'food_items.name'
    ];

    function __construct()
    {
        parent::__construct();
    }


    public function add($data)
    {
        return $this->insert($data);
    }


    public function remove($id)
    {
        return $this->drop(['id' => $id]);
    }


    public function view_item()
    {
        return $this->get_all();
    }


    public function view_join_where($join_table,$where, $condition , $type , $extra, $group,  $limit , $start , $or_where)
    {

        return $this->get_join_extra($join_table, $this->fields, $where, $condition , $type , $extra,$group ,  $limit , $start , $or_where );
    }



}
