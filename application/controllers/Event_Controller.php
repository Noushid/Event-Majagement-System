<?php 

/**
* 
*/
class Event_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Event_Model');
 		$this->load->helper('form');
 		$this->load->helper('url');
 		$this->load->library('form_validation');
 		$this->load->helper('security');
	}
	public function index()
	{
		$this->load->view('add_event');
	}
	public function add_event()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('start_time','Start time','required');
		$this->form_validation->set_rules('start_date','Strat date','required');
		$this->form_validation->set_rules('end_time','End Time','required');
		$this->form_validation->set_rules('end_date','End date','required');
		$this->form_validation->set_rules('people','No Of people','required');
		

		if ($this->form_validation->run() == FALSE) 
		{
			var_dump(validation_errors());
			$this->load->view('add_event');
		}
		else
		{
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$start_time = $this->input->post('start_time');
			$start_date = $this->input->post('start_date');
			$end_time = $this->input->post('end_time');
			$end_date = $this->input->post('end_date');
			$people= $this->input->post('pepole');
			$data = [
						'name' =>$name,
						'start_time'=>$start_time,
						'start_date'=>$start_date,
						'end_time'=>$end_time,
						'end_date'=>$end_date,
						'noof_people'=>$people,
			        ];
			$result = $this->Event_Model->insert_event($data);
			if ($result) 
			{
				$data['message'] = '<script type="text/javascript">
                                    var r = alert("successful!");
                                    if (r == true) {
                                        window.location = "' . base_url('event/add') . '";
                                    } else {
                                        window.location = "' . base_url('event/add') . '";
                                    }
                                </script>';
                $this->load->view('add_event',$data);                
			}

		}
	}

	public function view_event()
	{
		
		$data =$this->Event_Model->view_event();
		$this->load->library('table');
 		$this->table->set_heading('Name','Start Time','Start Date','End Time','End Date','NO OF People', '');
 		if(!empty($data))
 		{
	 		foreach ($data as $key => $value)
	 		{
	 			$this->table->add_row
	 								(
						 				$value->name,
						 				$value->description, 
						 				$value->start_time,
						 				$value->start_date,
						 				$value->end_time,
						 				$value->end_date,
						 				$value->noof_people,				
						 				'<a href="'. base_url('dashboard/event/delete/'.$value->id).'">delete<i class="fa fa-trash-o"></i></a>'
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
		$this->load->view('admin/view_event',$data);

	}
	public function delete($id)
	{
		if($this->Event_Model->delete_event($id));
		{
			redirect(base_url('dashboard/event'));
		}
	}
}