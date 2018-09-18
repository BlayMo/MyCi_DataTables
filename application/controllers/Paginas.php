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


class Paginas extends MY_Controller
{
    //private $limite_sup;        
    private $filas;                    
    private $nro_reg;
                
    function __construct()
    {
        parent::__construct();        
        $this->filas = 10; 
    }

    
    public function index($limite_sup = 0)        
    {
        $items = $this->Items_model->get_all_rango($this->filas,$limite_sup);
                    
        $this->nro_reg = $this->Items_model->total_rows();
        
        $data = array(
            'items_data' => $items
        );

        $this->paginar();
            
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('items/items_paginas', $data);
    }

    function paginar()
    {
        $config['base_url']         = site_url('paginas/siguiente');
        $config['first_url']        = site_url('paginas');           
        $config['per_page']         = $this->filas;           
        $config['total_rows']       = $this->nro_reg;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;

        $this->pagination->initialize($config);
    }
    
    public function siguiente()
    {            
        $pagina = intval($this->input->get('pagina'));
        $limite_sup = (($pagina * $this->filas) - $this->filas ) ; 
        if($limite_sup < 0){$limite_sup = 0;}
        $this->index($limite_sup);            
    }
           
    
}
