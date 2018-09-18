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

class Items extends MY_Controller
{
    private $subitems;
    private $items;
    private $recs;
    
    function __construct()
    {
        parent::__construct();                
        $this->subitems = new stdClass;
        $this->items    = $this->Items_model->get_all();
        $this->recs     = 0;                
    }

    public function index()
    {        
        $this->load->view('items/items_list');        
    } 
           
    public function md()
    {
        
        $data = array(
            'items_data' => $this->items,
            'subitems_data' => $this->subitems,
            'recs' => $this->recs
            
        );
        $this->load->view('items/items_maestro_detalle',$data);
    } 
    
    public function vimage($id){
        
        $row = $this->Items_model->get_by_id($id);
        if ($row) {
                        
            header('Location: '.$row->image_item);
            
        } else {
            $this->session->set_flashdata('message', 'Registro No Encontrado');
            redirect(site_url('items'));
        }        
    }
       
    public function json() {
        header('Content-Type: application/json');
        $data = $this->Items_model->json();
        //write_file('./files/data.json', $data, 'w+');        
        echo $data;
    }
    
  
    public function detmd($id_item){
        $this->subitems    = $this->Subitems_model->get_all_det($id_item);
        $this->recs        = $id_item;
        $this->md();
    }
    
    public function todo(){
        $this->subitems    = new stdClass();
        $this->items       = $this->Items_model->get_all();
        $this->recs        = 0;
        $this->md();
    }

    public function noserver()
    {        
        $data = array(            
            'iquery' => $this->Items_model->get_all_query(),
            'isql' => $this->Items_model->get_all_sql()
        );

        $this->load->view('items/items_list_nserv', $data);
    }
    
    public function read($id) 
    {
        $row = $this->Items_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_item' => $row->id_item,
		'item' => $row->item,
		'texto_item' => $row->texto_item,
		'image_item' => $row->image_item,
	    );
            
            $data['vista'] = 'items/items_read';
            $data['modal_title'] = 'Read Item';
            $this->load->view('view_modal', $data);
        } else {
            $this->session->set_flashdata('message', 'Registro No Encontrado');
            redirect(site_url('items'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('items/create_action'),
	    'id_item' => set_value('id_item'),
	    'item' => set_value('item'),
	    'texto_item' => set_value('texto_item'),
	    'image_item' => set_value('image_item'),
	);
        
        $data['vista'] = 'items/items_form';
        $data['modal_title'] = 'New Item';
        $this->load->view('view_modal', $data);
        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'item' => $this->input->post('item',TRUE),
                'iditem' => random_string('alnum', 32),
		'texto_item' => $this->input->post('texto_item',TRUE),
		'image_item' => $this->input->post('image_item',TRUE),
	    );

            $this->Items_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('items'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Items_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('items/update_action'),
		'id_item' => set_value('id_item', $row->id_item),
		'item' => set_value('item', $row->item),
		'texto_item' => set_value('texto_item', $row->texto_item),
		'image_item' => set_value('image_item', $row->image_item),
	    );
            
            $data['vista'] = 'items/items_form';
            $data['modal_title'] = 'Update Item';
            $this->load->view('view_modal', $data);
            
        } else {
            $this->session->set_flashdata('message', 'Registro No Encontrado');
            redirect(site_url('items'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_item', TRUE));
        } else {
            $data = array(
		'item' => $this->input->post('item',TRUE),
		'texto_item' => $this->input->post('texto_item',TRUE),
		'image_item' => $this->input->post('image_item',TRUE),
	    );

            $this->Items_model->update($this->input->post('id_item', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('items'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Items_model->get_by_id($id);

        if ($row) {
            $this->Items_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('items'));
        } else {
            $this->session->set_flashdata('message', 'Registro No Encontrado');
            redirect(site_url('items'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('item', 'item', 'trim|required');
	$this->form_validation->set_rules('texto_item', 'texto item', 'trim');
	$this->form_validation->set_rules('image_item', 'image item', 'trim');

	$this->form_validation->set_rules('id_item', 'id_item', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
