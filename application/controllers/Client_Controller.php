<?php 
/**
* 
*/
class Client_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Client_Model');
 		$this->load->helper('form');
 		$this->load->helper('url');
 		$this->load->library('form_validation');
 		$this->load->helper('security');
	}
	public function index()
	{
		$this->load->view('add_client');
	}
	public function add_client()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('phone','Phone no','required');
		$this->form_validation->set_rules('place','Place','required');
		$this->form_validation->set_rules('bank','Bank Name','required');
		$this->form_validation->set_rules('ac_no','A/c no ','required');
		$this->form_validation->set_rules('amount','Amount ','required');
		if ($this->form_validation->run() == FALSE) 
		{
			var_dump(validation_errors());
			$this->load->view('add_client');
		}
		else
		{
			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$phone = $this->input->post('phone');
			$place = $this->input->post('place');
			$bank =$this->input->post('bank');
			$ac_no = $this->input->post('ac_no');
			$amount = $this->input->post('amount');
			$data =[
						'name'=>$name,
						'address'=>$address,
						'phoneno'=>$phone,
						'place'=>$place,
						'bank_name'=>$bank,
						'acno' =>$ac_no,
						'amount'=>$amount
			       ];
			$result = $this->Client_Model->insert_cli($data);
			if ($result) 
			{
				$data['message'] = '<script type="text/javascript">
                                    var r = alert("successful!");
                                    if (r == true) {
                                        window.location = "' . base_url('add_client') . '";
                                    } else {
                                        window.location = "' . base_url('add_client') . '";
                                    }
                                </script>';
                $this->load->view('add_client',$data);                
			}

		}
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