<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Login_model');
    } 

    /*
     * Load login screen
     */
    function index()
    {        
        $data['_view'] = 'login/index';
        $this->load->view('layouts/login',$data);
    }

    /*
     * Check credits
     */
    function check()
    {            
        $this->form_validation->set_rules('email','EMAIL','required|valid_email');
        $this->form_validation->set_rules('mdp','MOT DE PASSE','required');
        		
		if($this->form_validation->run())     
        {   
            $user_data = $this->Login_model->get_user_data($this->input->post('email'));
            if(isset($user_data)){
                print_r($user_data);
                $user_group_permissions = $this->Login_model->get_user_group_permission($user_data['code_groupe']);
            } else {
                echo "Utilisateur non trouvé";
            }
        }
        else
        {            
            $data['_view'] = 'login/index';
            $this->load->view('layouts/login',$data);
        }
    }  

    /*
     * Editing a login
     */
    function edit($id)
    {   
        // check if the login exists before trying to edit it
        $data['login'] = $this->Login_model->get_login($id);

        $currentDateTime = date('Y-m-d H:i:s');
        
        if(isset($data['login']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('annee','ANNEE','required|exact_length[4]|greater_than[2019]',
            //array('required' => 'Le champ %s est obligatoire.')
            );
            $this->form_validation->set_rules('login','PASSAGE','required|less_than[5]|greater_than[0]', 
                //array('required' => 'Le champ %s est obligatoire.')
            );
			if($this->form_validation->run())     
            {   
                $params = array(
					'annee' => $this->input->post('annee'),
					'login' => $this->input->post('login'),
					'date_maj' => $currentDateTime,					
                );

                $this->Login_model->update_login($id,$params);            
                redirect('login/index');
            }
            else
            {
                $data['_view'] = 'login/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The login you are trying to edit does not exist.');
    } 

    /*
     * Loginout session
     */
    function logout()
    {
        $this->session->sess_destroy();    
    }
    
}
