<?php
/**
 * Created by PhpStorm.
 * User: noushi
 * Date: 6/4/16
 * Time: 3:06 PM
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        $this->load->view('admin/dashboard');
    }


}
