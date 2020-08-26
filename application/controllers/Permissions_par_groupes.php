<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permissions_par_groupes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Permissions_par_groupes_model');
        $this->load->model('Permissions_model');
        $this->load->model('Groupes_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'permissions_par_groupes/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permissions_par_groupes/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permissions_par_groupes/index.html';
            $config['first_url'] = base_url() . 'permissions_par_groupes/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Permissions_par_groupes_model->total_rows($q);
        $permissions_par_groupes = $this->Permissions_par_groupes_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'permissions_par_groupes_data' => $permissions_par_groupes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'permissions_data' => $this->Permissions_model->get_all(),
            'groupes_data' => $this->Groupes_model->get_all(),
        );
        $this->load->view('permissions_par_groupes/permissions_par_groupes_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Permissions_par_groupes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_groupe' => $row->id_groupe,
		'id_permission' => $row->id_permission,
	    );
            $this->load->view('permissions_par_groupes/permissions_par_groupes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Enr non trouvé');
            redirect(site_url('permissions_par_groupes'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Ajouter',
            'action' => site_url('permissions_par_groupes/create_action'),
	    'id' => set_value('id'),
	    'id_groupe' => set_value('id_groupe'),
	    'id_permission' => set_value('id_permission'),
	);
        $this->load->view('permissions_par_groupes/permissions_par_groupes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_groupe' => $this->input->post('id_groupe',TRUE),
		'id_permission' => $this->input->post('id_permission',TRUE),
	    );

            $this->Permissions_par_groupes_model->insert($data);
            $this->session->set_flashdata('message', 'Enr ajouté avec succès');
            redirect(site_url('permissions_par_groupes'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Permissions_par_groupes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Modifier',
                'action' => site_url('permissions_par_groupes/update_action'),
		'id' => set_value('id', $row->id),
		'id_groupe' => set_value('id_groupe', $row->id_groupe),
		'id_permission' => set_value('id_permission', $row->id_permission),
	    );
            $this->load->view('permissions_par_groupes/permissions_par_groupes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Enr non trouvé');
            redirect(site_url('permissions_par_groupes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_groupe' => $this->input->post('id_groupe',TRUE),
		'id_permission' => $this->input->post('id_permission',TRUE),
	    );

            $this->Permissions_par_groupes_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Enr mise à jour avec succès');
            redirect(site_url('permissions_par_groupes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Permissions_par_groupes_model->get_by_id($id);

        if ($row) {
            $this->Permissions_par_groupes_model->delete($id);
            $this->session->set_flashdata('message', 'Enr supprimé avec succès');
            redirect(site_url('permissions_par_groupes'));
        } else {
            $this->session->set_flashdata('message', 'Enr non trouvé');
            redirect(site_url('permissions_par_groupes'));
        }
    }

    public function permissions_du_groupe($id) 
    {
        $row = $this->Permissions_par_groupes_model->get_permissions_for_group($id);

        if ($row) {
            var_dump($row);
        } else {
            $this->session->set_flashdata('message', 'Groupe non trouvé');
            redirect(site_url('permissions_par_groupes/permissions_du_groupe'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_groupe', 'id groupe', 'trim|required');
	$this->form_validation->set_rules('id_permission', 'id permission', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Permissions_par_groupes.php */
/* Location: ./application/controllers/Permissions_par_groupes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-24 21:11:55 */
/* http://harviacode.com */