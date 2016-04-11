<?php
/**
 * Created by PhpStorm.
 * User: noushi
 * Date: 10/4/16
 * Time: 11:17 AM
 * author: Noushid
 */
require_once(APPPATH . 'core/My_Model.php');

class Decoration_Model extends My_Model
{
    protected $table = 'decaration';

    public function __construct()
    {
        parent::__construct();
    }

    public function view_all()
    {
        return $this->get();
    }

    public function view_where($where)
    {
        return $this->get($where);
    }


    public function add($data)
    {
        return $this->insert($data);
    }

    public function delete($id)
    {
        return $this->delete($id);
    }
}