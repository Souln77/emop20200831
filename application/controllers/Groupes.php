<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Groupes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Groupes_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'groupes/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'groupes/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'groupes/index.html';
            $config['first_url'] = base_url() . 'groupes/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Groupes_model->total_rows($q);
        $groupes = $this->Groupes_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'groupes_data' => $groupes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['_view'] = 'groupes/groupes_list';
        $this->load->view('layouts/main', $data);
    }

    public function read($id) 
    {
        $row = $this->Groupes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nom' => $row->nom,
		'description' => $row->description,
	    );
            $this->load->view('groupes/groupes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('groupes'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Ajouter',
            'action' => site_url('groupes/create_action'),
	    'id' => set_value('id'),
	    'nom' => set_value('nom'),
	    'description' => set_value('description'),
	);
        $this->load->view('groupes/groupes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nom' => $this->input->post('nom',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Groupes_model->insert($data);
            $this->session->set_flashdata('message', 'Enr ajouté avec succès');
            redirect(site_url('groupes'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Groupes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Modifier',
                'action' => site_url('groupes/update_action'),
		'id' => set_value('id', $row->id),
		'nom' => set_value('nom', $row->nom),
		'description' => set_value('description', $row->description),
	    );
            $this->load->view('groupes/groupes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('groupes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nom' => $this->input->post('nom',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Groupes_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Enr mise à jour avec succès');
            redirect(site_url('groupes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Groupes_model->get_by_id($id);

        if ($row) {
            $this->Groupes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('groupes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('groupes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nom', 'nom', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "groupes.xls";
        $judul = "groupes";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nom");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");

	foreach ($this->Groupes_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nom);
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
        header("Content-Disposition: attachment;Filename=groupes.doc");

        $data = array(
            'groupes_data' => $this->Groupes_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('groupes/groupes_doc',$data);
    }

}

/* End of file Groupes.php */
/* Location: ./application/controllers/Groupes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-24 19:57:36 */
/* http://harviacode.com */