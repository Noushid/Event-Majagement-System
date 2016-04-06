<?php 



/**
* 
*/
class Vehicle_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Vehicle_Model');
 		$this->load->helper('form');
 		$this->load->helper('url');
 		$this->load->library('form_validation');
 		$this->load->helper('security');
	}
	public function index()
	{
		$this->load->view('admin/add_vehicle');
	}
	public function add_vehilcle()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('reg_no','Register No','required');
		$this->form_validation->set_rules('seat','Seat','required');
		$this->form_validation->set_rules('price','Price','required');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('admin/add_vehicle');
		}
		else
		{
			$name = $this->input->post('name');
			$reg_no =$this->input->post('reg_no');
			$seat = $this->input->post('seat');
			$price = $this->input->post('price');
			$data =[
						'name'=>$name,
						'reg_no'=>$reg_no,
						'seat' =>$seat,
						'price'=>$price,
			       ];
			$result = $this->Vehicle_Model->insert_vehice($data);
			if ($result) 
			{
				$data['message'] = '<script type="text/javascript">
                                    var r = alert("successful!");
                                    if (r == true) {
                                        window.location = "' . base_url('add_vehicle') . '";
                                    } else {
                                        window.location = "' . base_url('add_vehicle') . '";
                                    }
                                </script>';
                $this->load->view('admin/add_vehicle',$data);                
			}

		}
	}
	public function view()
	{

		$data =$this->Vehicle_Model->view();
		$this->load->library('table');
 		$this->table->set_heading('Name',  'Register No','Seat', 'Price','','');
 		if(!empty($data))
 		{
	 		foreach ($data as $key => $value)
	 		{
	 			$this->table->add_row
	 								(
						 				$value->name,
						 				$value->reg_no,
						 				$value->seat,
						 				$value->price,
						 				'<a href="'. base_url('dashboard/vehicle/delete/'.$value->id).'">delete<i class="fa fa-trash-o"></i></a>'
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
 		
 	}
		$this->load->view('admin/view_vehicle',$data);
	
	}
	public function delete($id)
	{
		if($this->Vehicle_Model->delete_vehicle($id));
		{
			redirect(base_url('dashboard/vehicle'));
		}

	}
}













 ?>