<?php
/**
 * Created by PhpStorm.
 * User: noushi
 * Date: 6/4/16
 * Time: 3:06 PM
 */
require_once(APPPATH.'controllers/Check_Logged.php');
class Dashboard extends Check_Logged
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Decoration_Model');
        $this->load->model('User_Model');
    }

    public function dashboard()
    {
        if ($this->logged == true and $_SESSION['type'] == 'admin') {

            $this->load->view('admin/dashboard');
        }
        else
            redirect(base_url('admin-log'));
    }


    public function view_decoration()
    {
        if ($this->logged == true and $_SESSION['type'] == 'admin') 
        {

            $data =$this->Decoration_Model->view_all();
            $this->load->library('table');
            $this->table->set_heading('Name',  'type', 'price',anchor(base_url('dashboard/decoration/add'),'add',['class' => 'button normal-button']));
            if(!empty($data))
            {
                foreach ($data as $key => $value)
                {
                    $this->table->add_row
                    (
                        $value->name,
                        $value->type,
                        $value->price,
                        '<a href="'. base_url('dashboard/decoration/delete/'.$value->id).'">delete<i class="fa fa-trash-o"></i></a>'
                    );
                }
                $template = [
                    'table_open'            => '<table id="testimonial" class = "table">',
                    'thead_open'            => '<thead class="header">',
                    'thead_close'           => '</thead>',

                    'heading_row_start'     => '<tr>',
                    'heading_row_end'       => '</tr>',
                    'heading_cell_start'    => '<th>',
                    'heading_cell_end'      => '</th>',

                    'tbody_open'            => '<tbody>',
                    'tbody_close'           => '</tbody>',

                    'row_start'             => '<tr>',
                    'row_end'               => '</tr>',
                    'cell_start'            => '<td>',
                    'cell_end'              => '</td>',

                    'row_alt_start'         => '<tr>',
                    'row_alt_end'           => '</tr>',
                    'cell_alt_start'        => '<td>',
                    'cell_alt_end'          => '</td>',

                    'table_close'           => '</table>'
                ];
                $this->table->set_template($template);
                $data['data'] = $this->table->generate();

            } else {
                $data['message'] = 'No data Found
                                        <a href="'.base_url('dashboard/decoration/add').'">add</a>';
            }
            $this->load->view('admin/view_decoration',$data);
        }
        else
            redirect(base_url('admin-log'));
    }


    public function add_decoration()
    {
        if ($this->logged == true and $_SESSION['type'] == 'admin') 
        {

            $this->load->view('admin/add_decoration');
        }
        else
            redirect(base_url('admin-log'));
    }

    public function add_decoration_submit()
    {
        $name = $this->input->post('name');
        $type = $this->input->post('type');
        $price = $this->input->post('price');

        $data = [
            'name' => $name,
            'type' => $type,
            'price' => $price
        ];

        $query = $this->Decoration_Model->add($data);
        if ($query != false) {
            redirect(base_url('dashboard/decoration'));
        }
    }

    public function verify()
    {
        
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $where = [
            'user_name' => $username,
            'password' => $password,
        ];
        $result = $this->User_Model->get_where($where);
        if ($result != null) {
            $id = $result[0]->id;
            $userdata = [
                'username' => $username,
                'type' => 'admin',
                'id' => $id,
                'logged' => true
            ];

            $this->session->set_userdata($userdata);
            redirect(base_url('dashboard'));
        }
    }
}
