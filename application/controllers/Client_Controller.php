<?php 
/**
* 
*/
require_once(APPPATH . 'controllers/Check_Logged.php');

class Client_Controller extends Check_Logged
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Client_Model');
		$this->load->model('Booking_Model');
		$this->load->model('Category_Model');
		$this->load->model('Venue_Model');
		$this->load->model('Decoration_Model');
		$this->load->model('Event_Model');
		$this->load->model('Fooditem_Model');
 		$this->load->helper('form');
 		$this->load->helper('url');
 		$this->load->library(['form_validation', 'session']);
 		$this->load->helper('security');
	}
	public function index()
	{
		$this->load->view('add_client');
	}

    public function home()
    {
        if ($this->logged == true and $_SESSION['type'] == 'user') {
            $this->load->view('user/home');
        } else {
            redirect(base_url('login'));
        }

    }


    public function login()
    {
        if ($this->logged == true and $_SESSION['type'] == 'user') {
            redirect(base_url($_SESSION['username'].'/home'));
        } else {
            $this->load->view('log');
        }
    }

    public function login_verify()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $where = [
            'username' => $username,
            'password' => $password
        ];
        $result = $this->Client_Model->view_where($where);
        if ($result != null) {
            $id = $result[0]->id;
            $userdata = [
                'username' => $username,
                'type' => 'user',
                'id' => $id,
                'logged' => true
            ];

            $this->session->set_userdata($userdata);
            redirect(base_url($_SESSION['username'] . '/home'));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

	public function add_client()
	{
		$this->form_validation->set_rules('name','Name','required');
//		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('phone','Phone no','required');
		$this->form_validation->set_rules('place','Place','required');
//		$this->form_validation->set_rules('bank','Bank Name','required');
//		$this->form_validation->set_rules('ac_no','A/c no ','required');
//		$this->form_validation->set_rules('amount','Amount ','required');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('add_client');
		}
		else
		{
			$name = $this->input->post('name');
//			$address = $this->input->post('address');
			$phone = $this->input->post('phone');
			$place = $this->input->post('place');
//			$bank =$this->input->post('bank');
//			$ac_no = $this->input->post('ac_no');
//			$amount = $this->input->post('amount');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$data =[
                'name'=>$name,
                'phoneno'=>$phone,
                'place'=>$place,
                'email' => $email,
                'username' => $username,
                'password' => $password
             ];
			$result = $this->Client_Model->insert_cli($data);
			if ($result) 
			{
                $userdata = [
                    'username' => $username,
                    'type' => 'user',
                    'id' => $result,
                    'logged' => true
                ];
                $this->session->set_userdata($userdata);
                redirect(base_url($_SESSION['username'].'/home'));

//				$data['message'] = '<script type="text/javascript">
//                                    var r = alert("successful!");
//                                    if (r == true) {
//                                        window.location = "' . base_url('add_client') . '";
//                                    } else {
//                                        window.location = "' . base_url('add_client') . '";
//                                    }
//                                </script>';
//                $this->load->view('add_client',$data);
			}

		}
	}

    public function view_booking()
    {
        $client_id = $_SESSION['id'];
        $where= ['clients_id' => $client_id];
        $condition = [
            ['venues.id','events.venues_id']
        ];

        $data  =$this->Event_Model->get_join_where(['venues'], $where, $condition);


        $this->load->library('table');
        $this->table->set_heading('Name',  'starting date', 'ending date', 'venue', 'peoples',anchor(base_url(uri_string().'/add'),'add',['class' => 'button normal-button']));
        if(!empty($data))
        {
//            var_dump($data);
            foreach ($data['all'] as $key => $value)
            {
                $this->table->add_row
                (
                    anchor(base_url(uri_string().'/addfoods/'.$value->event_id), $value->name),
                    $value->start_date,
                    $value->end_date,
//                    $value->venue,
                    $value->noof_people
//                    '<a href="'. base_url('dashboard/decoration/delete/'.$value->id).'">delete<i class="fa fa-trash-o"></i></a>'
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
            $data['booking'] = $this->table->generate();

        } else {
            $data['message'] = 'No data Found';
        }

        $this->load->view('user/view_booking', $data);

    }


    public function book()
    {
        if ($this->logged == true and $_SESSION['type'] == 'user') {

            /* get all category */
            $catogery = $this->Category_Model->view();
            if ($catogery != false) {
                $data['category'] = $catogery;
            }

            /*get all venues*/

            $venue = $this->Venue_Model->view();
            if ($venue != null) {
                $data['venue'] = $venue;
            }


            /*get all decoration*/

            $decoration = $this->Decoration_Model->view_all();

            if ($decoration != null) {
                $data['decoration'] = $decoration;
            }

            $this->load->view('user/booking', $data);
        } else {
            redirect(base_url('login'));
        }
    }

    public function book_submit()
    {
//        $this->form_validation->set_rules('name','Name','required');
//        $this->form_validation->set_rules('description','Description');
//        $this->form_validation->set_rules('start_time','Start time','required');
//        $this->form_validation->set_rules('start_date','Strat date','required');
//        $this->form_validation->set_rules('end_time','End Time','required');
//        $this->form_validation->set_rules('end_date','End date','required');
//        $this->form_validation->set_rules('people','No Of people','required');
//
//
//        if ($this->form_validation->run() == FALSE)
//        {
//            $this->load->view('user/booking');
//        }
//        else
//        {
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $start_time = $this->input->post('start_time');
            $start_date = $this->input->post('start_date');
            $end_time = $this->input->post('end_time');
            $end_date = $this->input->post('end_date');
            $people= $this->input->post('pepole');

            $categories_id = $this->input->post('category');
            $decaration_id = $this->input->post('decoration');
            $venue_id = $this->input->post('venue');

            $client_id = $_SESSION['id'];

            $data = [
                'name' =>$name,
                'description' => $description,
                'start_time'=>$start_time,
                'start_date'=>$start_date,
                'end_time'=>$end_time,
                'end_date'=>$end_date,
                'noof_people'=>$people,
                'venues_id' => $venue_id,
//                'payment_id' => $payment_id,
                'categories_id' => $categories_id,
                'clients_id' => $client_id,
                'decaration_id' => $decaration_id
            ];
            $event_id = $this->Event_Model->insert_event($data);
            if ($event_id)
            {
                $data = [
                    'name' => $name,
                    'events_id' => $event_id,
                ];

                $booking_id = $this->Booking_Model->insert_booking($data);

                if ($booking_id != null) {
                    $data['message'] = '<script type="text/javascript">
                                    var r = alert("successful!");
                                    if (r == true) {
                                        window.location = "' . base_url($_SESSION['username'].'/booking') . '";
                                    } else {
                                        window.location = "' . base_url($_SESSION['username'].'/booking') . '";
                                    }
                                </script>';
                $this->load->view('user/booking',$data);
                }
            }

//        }
    }


    public function add_food()
    {
        /*get all food items*/

        $food = $this->Fooditem_Model->view_item();

        if ($food != false) {
            $data['food'] = $food;
        }
        $data['event_id'] = $this->uri->segment(4);

        $this->load->view('user/add_food',$data);
    }

    public function add_food_submit()
    {

        $type = $this->input->post('type');
        $item_id = $this->input->post('item');
        $event_id = $this->input->post('event_id');
        if (is_array($item_id)) {

        }

//        $data = [
//            'type' => $type,
//            'food_items_id' => $item_id,
//            'events_id' => $event_id,
//        ];
    }

	public function view()
	{

		$data =$this->Client_Model->view();
		$this->load->library('table');
 		$this->table->set_heading('Name', 'Address','Phone No','Place', 'Bank Name','A/c No','Amount','','');
 		if(!empty($data))
 		{
	 		foreach ($data as $key => $value)
	 		{
	 			$this->table->add_row
	 								(
						 				$value->name,
						 				$value->address,
						 				$value->phoneno,
						 				$value->place,
						 				$value->bank_name,
						 				$value->acno,
						 				$value->amount,
						 				'<a href="'. base_url('dashboard/client/delete/'.$value->id).'">delete<i class="fa fa-trash-o"></i></a>'
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
            $data['message'] = 'No data Found';
        }
		$this->load->view('admin/view_client',$data);
	
	}
	public function delete($id)
	{
		if($this->Client_Model->delete_cli($id));
		{
			redirect(base_url('dashboard/client'));
		}

	}
}






 ?>