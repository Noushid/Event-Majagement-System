<?php 

/**
* 
*/
class Food_ItemController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Fooditem_Model');
 		$this->load->helper('form');
 		$this->load->helper('url');
 		$this->load->library('form_validation');
 		$this->load->helper('security');
	}
	public function index()
	{
		$this->load->view('admin/add_fooditem');
	}
	public function add_item()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('description','Description');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('admin/add_fooditem');
		}
		else
		{
			$name = $this->input->post('name');
			$description = $this->input->post('description');

			$data = [
						'name' =>$name,
						'description'=>$description,
			        ];
			$result = $this->Fooditem_Model->insert_item($data);
			if ($result) 
			{
				$data['message'] = '<script type="text/javascript">
                                    var r = alert("successful!");
                                    if (r == true) {
                                        window.location = "' . base_url('dashboard/foods') . '";
                                    } else {
                                        window.location = "' . base_url('dashboard/foods') . '";
                                    }
                                </script>';
                $this->load->view('admin/add_fooditem',$data);                
			}

		}
	}

	public function view_item()
	{
		
		$data =$this->Fooditem_Model->view_item();
		$this->load->library('table');
 		$this->table->set_heading('Name',  'Description', anchor(base_url('dashboard/fooditem/add'),'Add',['class' => 'button normal-button']));
 		if(!empty($data))
 		{
	 		foreach ($data as $key => $value)
	 		{
	 			$this->table->add_row
	 								(
						 				$value->name, 				
						 				$value->description,
						 				'<a href="'. base_url('dashboard/fooditem/delete/'.$value->id).'">delete<i class="fa fa-trash-o"></i></a>'
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
                                    <a href="'.base_url('dashboard/fooditem/add').'">add</a>';
        }
		$this->load->view('admin/view_fooditem',$data);

	}
	public function delete($id)
	{
		if($this->Fooditem_Model->delete_item($id));
		{
			redirect(base_url('dashboard/foods'));
		}
	}
}