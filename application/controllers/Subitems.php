<?php

/* 
 * The MIT License
 *
 * Copyright 2018 Blay.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Subitems extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        $this->load->view('subitems/subitems_list');
    } 
    
    public function sitems()
    {
        
        $data = array(            
            'iquery' => $this->Subitems_model->get_all_query(),
            'isql' => $this->Subitems_model->get_all_sql()
        );
        
        $this->load->view('subitems/subitems_list_noserv', $data);
    }
    
    
    public function svimage($id){
        
        $row = $this->Subitems_model->get_by_id($id);
        if ($row) {
                        
            header('Location: '.$row->image_subitem);
            
        } else {
            $this->session->set_flashdata('message', 'Registro No Encontrado');
            redirect(site_url('subitems'));
        }
        
    }
    
    public function json() {
        header('Content-Type: application/json');
        $data = $this->Subitems_model->json();
        //write_file('./files/subdata.json', $data, 'w+');       
        echo $data;
    }

    public function read($id) 
    {
        $row = $this->Subitems_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_subitem' => $row->id_subitem,
		'idsubitem' => $row->idsubitem,
		'id_item' => $row->id_item,
		'subitem' => $row->subitem,
		'texto_subitem' => $row->texto_subitem,
		'image_subitem' => $row->image_subitem,
	    );
            
            $data['vista'] = 'subitems/subitems_read';
            $data['modal_title'] = 'Read SubItem';
            $this->load->view('view_modal', $data);
            
        } else {
            $this->session->set_flashdata('message', 'Registro No Encontrado');
            redirect(site_url('subitems'));
        }
    }

    public function create($id_item) 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('subitems/create_action'),
	    'id_subitem' => set_value('id_subitem'),
	    'idsubitem' => set_value('idsubitem'),
	    'id_item' => set_value('id_item',$id_item),
	    'subitem' => set_value('subitem'),
	    'texto_subitem' => set_value('texto_subitem'),
	    'image_subitem' => set_value('image_subitem'),
	);
        
        $data['vista'] = 'subitems/subitems_form';
        $data['modal_title'] = 'New SubItem';
        $this->load->view('view_modal', $data);
       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idsubitem' => random_string('alnum', 32),
		'id_item' => $this->input->post('id_item',TRUE),
		'subitem' => $this->input->post('subitem',TRUE),
		'texto_subitem' => $this->input->post('texto_subitem',TRUE),
		'image_subitem' => $this->input->post('image_subitem',TRUE),
	    );

            $this->Subitems_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('subitems'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Subitems_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('subitems/update_action'),
		'id_subitem' => set_value('id_subitem', $row->id_subitem),
		'idsubitem' => set_value('idsubitem', $row->idsubitem),
		'id_item' => set_value('id_item', $row->id_item),
		'subitem' => set_value('subitem', $row->subitem),
		'texto_subitem' => set_value('texto_subitem', $row->texto_subitem),
		'image_subitem' => set_value('image_subitem', $row->image_subitem),
	    );
            
            $data['vista'] = 'subitems/subitems_form';
            $data['modal_title'] = 'Update SubItem';
            $this->load->view('view_modal', $data);
            
        } else {
            $this->session->set_flashdata('message', 'Registro No Encontrado');
            redirect(site_url('subitems'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_subitem', TRUE));
        } else {
            $data = array(
		'idsubitem' => $this->input->post('idsubitem',TRUE),
		'id_item' => $this->input->post('id_item',TRUE),
		'subitem' => $this->input->post('subitem',TRUE),
		'texto_subitem' => $this->input->post('texto_subitem',TRUE),
		'image_subitem' => $this->input->post('image_subitem',TRUE),
	    );

            $this->Subitems_model->update($this->input->post('id_subitem', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('subitems'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Subitems_model->get_by_id($id);

        if ($row) {
            $this->Subitems_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('subitems'));
        } else {
            $this->session->set_flashdata('message', 'Registro No Encontrado');
            redirect(site_url('subitems'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('idsubitem', 'idsubitem', 'trim|required');
	//$this->form_validation->set_rules('id_item', 'id item', 'trim|required');
	$this->form_validation->set_rules('subitem', 'subitem', 'trim|required');
	$this->form_validation->set_rules('texto_subitem', 'texto subitem', 'trim');
	$this->form_validation->set_rules('image_subitem', 'image subitem', 'trim');

	$this->form_validation->set_rules('id_subitem', 'id_subitem', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
