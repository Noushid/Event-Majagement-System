<?php
/**
 * Created by PhpStorm.
 * User: noushi
 * Date: 9/4/16
 * Time: 11:39 AM
 */
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function home()
    {
        $this->load->view('index');
    }

    public function about()
    {
        $this->load->view('about');
    }

    public function services()
    {
        $this->load->view('services');
    }

    public function contact()
    {
        $this->load->view('contacts');
    }

    public function gallery()
    {
        $this->load->view('gallery');
    }


    public function admin_log()
    {
        $this->load->view('admlog');
    }

    public function register()
    {
        $this->load->view('signup');
    }






}