<?php
/**
 * Created by PhpStorm.
 * User: noushi
 * Date: 9/4/16
 * Time: 2:12 PM
 */
class User_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registration()
    {
        $name = $this->input->post('name');
        $email= $this->input->post('email');
        $phone = $this->input->post('phone');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ];

        $userdata = [
            'username' => $username,
            'password' =>$password
        ];





    }
}