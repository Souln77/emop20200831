<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Utilisateur extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Utilisateur_model');
    } 

    /*
     * Listing of utilisateur
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('utilisateur/index?');
        $config['total_rows'] = $this->Utilisateur_model->get_all_count();
        $this->pagination->initialize($config);

        $data['utilisateur'] = $this->Utilisateur_model->get_all($params);
        
        $data['_view'] = 'utilisateur/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new utilisateur
     */
    function add()
    {        
        $this->form_validation->set_rules('prenom','PRENOM','required|min_length[2]',
            //array('alpha' => 'Seul les caractères non accentués sont acceptés.')
        );
        $this->form_validation->set_rules('nom','NOM','required|min_length[2]',
            //array('alpha' => 'Seul les caractères non accentués sont acceptés.')
        );
        $this->form_validation->set_rules('email','EMAIL','required|is_unique[utilisateur.email]|valid_email');
        $this->form_validation->set_rules('mdp','MOT DE PASSE','required|min_length[8]');
        
		
		if($this->form_validation->run())     
        {   
            $currentDateTime = date('Y-m-d H:i:s');            
            $params = array(
                'prenom' => $this->input->post('prenom') . $this->input->post('utilisateur'),
				'nom' => $this->input->post('nom'),
				'email' => $this->input->post('email'),
                'mdp' => md5($this->input->post('mdp')),
                'code_groupe' => 0,
                'date_creation' => $currentDateTime,	
				'date_maj' => $currentDateTime,				
            );
            
            $utilisateur_id = $this->Utilisateur_model->add($params);
            redirect('utilisateur/index');
        }
        else
        {            
            $data['_view'] = 'utilisateur/add';
            $this->load->view('admin/main',$data);
        }
    }  

    /*
     * Editing a utilisateur
     */
    function edit($id)
    {   
        // check if the utilisateur exists before trying to edit it
        $data['utilisateur'] = $this->Utilisateur_model->get($id);

        $currentDateTime = date('Y-m-d H:i:s');
        
        if(isset($data['utilisateur']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('annee','ANNEE','required|exact_length[4]|greater_than[2019]',
            //array('required' => 'Le champ %s est obligatoire.')
            );
            $this->form_validation->set_rules('utilisateur','PASSAGE','required|less_than[5]|greater_than[0]', 
                //array('required' => 'Le champ %s est obligatoire.')
            );
			if($this->form_validation->run())     
            {   
                $params = array(
					'annee' => $this->input->post('annee'),
					'utilisateur' => $this->input->post('utilisateur'),
					'date_maj' => $currentDateTime,					
                );

                $this->Utilisateur_model->update($id,$params);            
                redirect('utilisateur/index');
            }
            else
            {
                $data['_view'] = 'utilisateur/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The utilisateur you are trying to edit does not exist.');
    } 

    /*
     * Deleting utilisateur
     */
    function remove($id)
    {
        $utilisateur = $this->Utilisateur_model->get($id);

        // check if exists before trying to delete it
        if(isset($utilisateur['id']))
        {
            $this->Utilisateur_model->delete($id);
            redirect('utilisateur/index');
        }
        else
            show_error('The utilisateur you are trying to delete does not exist.');
    }
    
}
