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
 * 
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Items_model extends MY_Model
{
    
    function __construct()
    {
        parent::__construct();
        $this->table = 'items';
        $this->id    = 'id_item';
        $this->order = 'DESC';
    }

    // datatables
    function json() {
        $this->datatables->select('id_item,item,texto_item,image_item');
        $this->datatables->from('items');
        
        //$this->datatables->edit_column('image_item', '<a href="items/vimage/$1" target="_blank">Imagen</a>','id_item' ,'image_item');
        $this->datatables->edit_column('image_item', '<img class="img-responsive" src="$1" />','image_item' ,'image_item');
        $this->datatables->add_column('action', anchor(site_url('items/read/$1'),$this->config->item('btn_read')).
                "  ".anchor(site_url('items/update/$1'),$this->config->item('btn_update')).
                "  ".anchor(site_url('items/delete/$1'),$this->config->item('btn_del'),'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_item');
        return $this->datatables->generate();
    }
       
}
