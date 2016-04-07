<?php 

/**
* 
*/
class Booking_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Booking_Model');
 		$this->load->helper('form');
 		$this->load->helper('url');
 		$this->load->library('form_validation');
 		$this->load->helper('security');
	}
	public function index()
	{
		$this->load->view('admin/add_booking');
	}
	public function add_booking()
	{
		$this->form_validation->set_rules('name','Name','required');
		

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('admin/add_booking');
		}
		else
		{
			$name = $this->input->post('name');
			$data = [
						'name' =>$name,
			        ];
			$result = $this->Booking_Model->insert_booking($data);
			if ($result) 
			{
				$data['message'] = '<script type="text/javascript">
                                    var r = alert("successful!");
                                    if (r == true) {
                                        window.location = "' . base_url('dashboard/booking') . '";
                                    } else {
                                        window.location = "' . base_url('dashboard/booking') . '";
                                    }
                                </script>';
                $this->load->view('admin/add_booking',$data);                
			}

		}
	}

	public function view_booking()
	{
		
		$data =$this->Booking_Model->view_booking();
		$this->load->library('table');
 		$this->table->set_heading('Name', anchor(base_url('dashboard/booking/add'),'Add',['class' => 'button normal-button']));
 		if(!empty($data))
 		{
	 		foreach ($data as $key => $value)
	 		{
	 			$this->table->add_row
	 								(
						 				$value->name, 				
						 				'<a href="'. base_url('dashboard/booking/delete/'.$value->id).'">delete<i class="fa fa-trash-o"></i></a>'
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
                                    <a href="'.base_url('dashboard/booking/add').'">add</a>';
        }
		$this->load->view('admin/view_booking',$data);

	}
	public function delete($id)
	{
		if($this->Booking_Model->delete_booking($id));
		{
			redirect(base_url('dashboard/booking'));
		}
	}
}