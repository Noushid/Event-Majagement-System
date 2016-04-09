<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 23/12/15
 * Time: 12:23 PM
 * Author: Noushid
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Check_Logged extends CI_Controller
{
    public $logged = '';
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['form', 'url', 'security']);
        $this->load->library(['session', 'form_validation']);

        $this->logged = $this->session_check();
    }


    /*
     * Check the Session status
     * if session exist return true
     * else return false
     * */

    public function session_check()
    {
        if($this->session->userdata('logged') == true)
            return TRUE;
        else
            return FALSE;
    }
}