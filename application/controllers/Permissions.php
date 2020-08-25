<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permissions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Permissions_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'permissions/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permissions/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permissions/index.html';
            $config['first_url'] = base_url() . 'permissions/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Permissions_model->total_rows($q);
        $permissions = $this->Permissions_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'permissions_data' => $permissions,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('permissions/permissions_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Permissions_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'code' => $row->code,
		'description' => $row->description,
	    );
            $this->load->view('permissions/permissions_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Enr non trouvé');
            redirect(site_url('permissions'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Ajouter',
            'action' => site_url('permissions/create_action'),
	    'id' => set_value('id'),
	    'code' => set_value('code'),
	    'description' => set_value('description'),
	);
        $this->load->view('permissions/permissions_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'code' => $this->input->post('code',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Permissions_model->insert($data);
            $this->session->set_flashdata('message', 'Enr ajouté avec succès');
            redirect(site_url('permissions'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Permissions_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Modifier',
                'action' => site_url('permissions/update_action'),
		'id' => set_value('id', $row->id),
		'code' => set_value('code', $row->code),
		'description' => set_value('description', $row->description),
	    );
            $this->load->view('permissions/permissions_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Enr non trouvé');
            redirect(site_url('permissions'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'code' => $this->input->post('code',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Permissions_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Enr mise à jour avec succès');
            redirect(site_url('permissions'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Permissions_model->get_by_id($id);

        if ($row) {
            $this->Permissions_model->delete($id);
            $this->session->set_flashdata('message', 'Enr supprimé avec succès');
            redirect(site_url('permissions'));
        } else {
            $this->session->set_flashdata('message', 'Enr non trouvé');
            redirect(site_url('permissions'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('code', 'code', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "permissions.xls";
        $judul = "permissions";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");

	foreach ($this->Permissions_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=permissions.doc");

        $data = array(
            'permissions_data' => $this->Permissions_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('permissions/permissions_doc',$data);
    }

}

/* End of file Permissions.php */
/* Location: ./application/controllers/Permissions.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-24 20:56:32 */
/* http://harviacode.com */