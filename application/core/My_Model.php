<?php
/**
 * Created by PhpStorm.
 * User: noushi
 * Date: 10/11/15
 * Time: 1:09 PM
 * @author NOushid
*/


/**
 * My_model class which extends CI_model
 * you can use another model class which extends this class
 * @author: Noushid
 *
 */

defined('BASEPATH') OR exit('NO direct script access allowed');

class My_Model extends CI_Model
{
    protected $table = NULL;

    // protected $table_fields = [];

    // protected $fillable = [];

    // protected $protected = [];

    protected $primary_key = 'id';



    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /**
     * Return all table contents
     * @param array $where ,$fields, $limit, $start
     * @return array
     *defualt $sortOrder = dsc
     */

    public function get($where = NULL, array $fields = NULL, $limit = NULL, $start = NULL)
    {
        $query = NULL;
        // return all records with all fields from table
        if($fields == NULL and $where == NULL){

            $this->db->limit($limit, $start);
            $query = $this->db->get($this->table);
            if ($query->num_rows() > 0 ) {

                return $query->result();
            }
            else
                return false;
        }

        // rteurn all records with only my fields
        elseif($fields != NULL and $where == NULL){

            $this->db->limit($limit, $start);
            $this->db->select($fields);
            $query = $this->db->get($this->table);
            if ($query->num_rows() > 0)
                return $query->result();

            else
                return false;

        }

        // return all records through condition
        elseif($fields == NULL and $where != NULL){

            $this->db->where($where);
            $this->db->limit($limit, $start);
            $query = $this->db->get($this->table);
            if ($query->num_rows() > 0)
                return $query->result();

            else
                return false;
        }

        // return all records with only my fields through condition
        else{

            $this->db->limit($limit, $start);
            $this->db->select($fields);
            $query = $this->db->get_where($this->table, $where);

            if ($query->num_rows() > 0 )
                return $query->result();

            else
                return false;
        }
    }


    /**
     * Get All result from table
     * @param $limit, $start
     * @return array if success or false
     */


    public function get_all($limit = NULL, $start = NULL, $group = null)
    {
        $this->db->limit($limit, $start);
        if ($group != null) {
            $this->db->group_by($group);
        }
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }




    /**
     * @param $join_table
     * @param $fields
     * @param $where
     * @param array $condition
     * @param $type
     * @param $limit
     * @param $start
     * @return string or boolean
     */
    public function get_join($join_table = null, array $fields = null, array $where = null, array $condition = null, $type = null,$limit = null, $start = null)
    {

        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->limit($limit, $start);
        foreach ($join_table as $key => $value) {
            $cond = implode('=', $condition[$key]);
            $this->db->join($value, $cond, $type);
        }
        $this->db->select($fields);
        $query = $this->db->get();
//        var_dump($this->db->get_compiled_select());
        if ($query->num_rows() >= 0) {
            $result = [
                'last' => $query->last_row(),
                'all' => $query->result()
            ];
            return $result;
        } else {
            return FALSE;
        }
    }


    /**
     * @param $join_table
     * @param $fields
     * @param $where
     * @param array $condition
     * @param $type
     * @param $limit
     * @param $start
     * @param $extra
     * @param $group
     * @return string or boolean
     *
     */

    public function get_join_extra($join_table = null, array $fields = null, array $where = null, array $condition = null, $type = null, $extra= null,$group = null,  $limit = null, $start = null, $or_where = null)
    {
        $this->db->from($this->table);
        if (!empty($extra)) {
            $this->db->order_by('id',$extra);
        }
        $this->db->where($where);
        if (isset($or_where)) {
            $this->db->or_where($or_where);
        }
        $this->db->limit($limit,$start);
        foreach ($join_table as $key => $value) {
            $cond = implode('=', $condition[$key]);
            $this->db->join($value, $cond, $type);
        }
        $this->db->group_by($group);
        $this->db->select($fields);
        $query = $this->db->get();
//        echo ($this->db->get_compiled_select($this->table));
        if ($query->num_rows() > 0) {
            $result = [
                'last' => $query->last_row(),
                'all' => $query->result()
            ];
            return $result;
        } else {
            return FALSE;
        }
    }


    /**
     * Insert fields to table
     * @param array $data // fields name and values array
     * @return integer Last insert id if success or false
     */

    public function insert(array $data)
    {
        if ($this->db->insert($this->table, $data))
            return $this->db->insert_id();
        else
            return FALSE;

    }

    /**
     *
     *
     */

    public function update(array $data,$id)
    {
        //var_dump($this->table, $data, $id);
       // return $this->db->update($this->table, $data, $id);
        $this->db->where('id', $id);
        $update = $this->db->update($this->table, $data);
//        var_dump($update);
        return $update;
    }

    /**
     * delete records
     * @param array $where
     * @return boolean
     */

    public function drop(array $where)
    {
        $this->db->where($where);
//        var_dump($this->db->get_compiled_delete($this->table));
        if( $this->db->delete($this->table))
            return TRUE;
        else
            return FALSE;
    }


    public function count()
    {
        return $this->db->count_all($this->table);
    }


    /**
     * total amount one field
     * @param $where , $fields
     * @return total amount
     **/
    public function total_amount(array $where = NULL, $field = NULL)
    {
        if($where == NULL){

            $this->db->select_sum($field);
            $query = $this->db->get($this->table);
            if ($query->result() > 0) {
                return $query->result();
            }
            else
                return FALSE;
        }

        else{

            $this->db->where($where, NULL, FALSE);
            $this->db->select_sum($field);
            $query = $this->db->get($this->table);
            if ($query->result() > 0) {
                return $query->result();
            }
            else
                return FALSE;
        }
    }
    function get_random_page($fields,$limit)
    {
        $this->db->order_by('id','RANDOM');
        $this->db->limit($limit);
        $query = $this->db->get($this->table);
        //var_dump($query->result_array());
        return $query->result_array();

    }


    public function get_join_table($join_table = null, array $fields = null, array $where = null, array $condition = null, $type = null,$limit = null, $start = null)
    {

        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->limit($limit, $start);
        foreach ($join_table as $key => $value) {
            $cond = implode('=', $condition[$key]);
            $this->db->join($value, $cond, $type);
        }
        $this->db->select($fields);
        $query = $this->db->get();
//        var_dump($this->db->get_compiled_select($this->table));
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

}