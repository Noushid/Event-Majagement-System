<?php 
/**
* 
*/
class Payment_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Payment_Model');
 		$this->load->helper('form');
 		$this->load->helper('url');
 		$this->load->library('form_validation');
 		$this->load->helper('security');
	}
	public function index()
	{
		$this->load->view('admin/add_payment');
	}
	public function add_payment()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('from','A/c No from','required');
		$this->form_validation->set_rules('to','A/c no to','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('phone','Phone no','required');
		$this->form_validation->set_rules('email','Email','required');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('admin/add_payment');
		}
		else
		{
			$name = $this->input->post('name');
			$from =$this->input->post('from');
			$to = $this->input->post('to');
			$address = $this->input->post('address');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$data =[
						'name'=>$name,
						'acno_from'=>$from,
						'acno_to' =>$to,
						'address'=>$address,
						'phoneno'=>$phone,
						'email'=>$email
			       ];
			$result = $this->Payment_Model->insert_pay($data);
			if ($result) 
			{
				$data['message'] = '<script type="text/javascript">
                                    var r = alert("successful!");
                                    if (r == true) {
                                        window.location = "' . base_url('add_payment') . '";
                                    } else {
                                        window.location = "' . base_url('add_payment') . '";
                                    }
                                </script>';
                $this->load->view('admin/add_payment',$data);                
			}

		}
	}
	public function view()
	{

		$data =$this->Payment_Model->view();
		$this->load->library('table');
 		$this->table->set_heading('Name',  'A/c no From','A/c no To', 'Address','Phone No','Email','','');
 		if(!empty($data))
 		{
	 		foreach ($data as $key => $value)
	 		{
	 			$this->table->add_row
	 								(
						 				$value->name,
						 				$value->acno_from,
						 				$value->acno_to,
						 				$value->address,
						 				$value->phoneno,
						 				$value->email,
						 				'<a href="'. base_url('dashboard/payment/delete/'.$value->id).'">delete<i class="fa fa-trash-o"></i></a>'
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
		$this->load->view('admin/view_payment',$data);
	
	}
	public function delete($id)
	{
		if($this->Payment_Model->delete_pay($id));
		{
			redirect(base_url('dashboard/payment'));
		}

	}
}






 ?>