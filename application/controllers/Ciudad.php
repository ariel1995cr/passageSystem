<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Ciudad extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ciudad_model');
    }


    /*
     * Listing of ciudades
     */
    function index()
    {

        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('ciudad/index?');
        $config['total_rows'] = $this->Ciudad_model->get_all_ciudades_count();
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data['ciudades'] = $this->Ciudad_model->get_all_ciudades($params);
        
        $data['_view'] = 'ciudad/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new ciudad
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nombreCiudad','NombreCiudad','required|max_length[30]|is_unique[nombreCiudad]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nombreCiudad' => $this->input->post('nombreCiudad'),
            );
            
            $ciudad_id = $this->Ciudad_model->add_ciudad($params);
            redirect('ciudad/index');
        }
        else
        {            
            $data['_view'] = 'ciudad/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a ciudad
     */
    function edit($idCiudad)
    {   
        // check if the ciudad exists before trying to edit it
        $data['ciudad'] = $this->Ciudad_model->get_ciudad($idCiudad);
        
        if(isset($data['ciudad']['idCiudad']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nombreCiudad','NombreCiudad','required|max_length[30]|is_unique[nombreCiudad]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nombreCiudad' => $this->input->post('nombreCiudad'),
                );

                $this->Ciudad_model->update_ciudad($idCiudad,$params);            
                redirect('ciudad/index');
            }
            else
            {
                $data['_view'] = 'ciudad/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The ciudad you are trying to edit does not exist.');
    } 

    /*
     * Deleting ciudad
     */
    function remove($idCiudad)
    {
        $ciudad = $this->Ciudad_model->get_ciudad($idCiudad);

        // check if the ciudad exists before trying to delete it
        if(isset($ciudad['idCiudad']))
        {
            $this->Ciudad_model->delete_ciudad($idCiudad);
            redirect('ciudad/index');
        }
        else
            show_error('The ciudad you are trying to delete does not exist.');
    }
    
}