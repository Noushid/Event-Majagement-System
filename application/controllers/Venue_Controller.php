<?php 

/**
* 
*/
class Venue_Controller extends CI_Controller 
{

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Venue_Model');
 		$this->load->helper('form');
 		$this->load->helper('url');
 		$this->load->library('form_validation');
 		$this->load->helper('security');
	}
	public function index()
	{
		$this->load->view('admin/add_venue');
	}
	public function add_venue()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('description','Description');
		$this->form_validation->set_rules('type','Type','required');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('admin/add_venue');
		}
		else
		{
			$name = $this->input->post('name');
			$discription = $this->input->post('description');
			$type = $this->input->post('type');
			$data =[
						'name'=>$name,
						'description'=>$discription,
						'type'=>$type,
			       ];
			$result = $this->Venue_Model->insert_ven($data);
			if ($result) 
			{
				$data['message'] = '<script type="text/javascript">
                                    var r = alert("successful!");
                                    if (r == true) {
                                        window.location = "' . base_url('dashboard/venues') . '";
                                    } else {
                                        window.location = "' . base_url('dashboard/venues') . '";
                                    }
                                </script>';
                $this->load->view('admin/add_venue',$data);                
			}

		}
	}
	public function view()
	{

		$data =$this->Venue_Model->view();
		$this->load->library('table');
 		$this->table->set_heading('Name',  'Description','Type', '',anchor(base_url('dashboard/venues/add'),'add',['class' => 'button normal-button']));
 		if(!empty($data))
 		{
	 		foreach ($data as $key => $value)
	 		{
	 			$this->table->add_row
	 								(
						 				$value->name,
						 				$value->description,
						 				$value->type,
						 				'<a href="'. base_url('dashboard/venue/delete/'.$value->id).'">delete<i class="fa fa-trash-o"></i></a>'
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
                                    <a href="'.base_url('dashboard/venues/add').'">add</a>';
        }
		$this->load->view('admin/view_venue',$data);
	
	}
	public function delete($id)
	{
		if($this->Venue_Model->delete_ven($id));
		{
			redirect(base_url('dashboard/venues'));
		}

	}

}





















 ?>