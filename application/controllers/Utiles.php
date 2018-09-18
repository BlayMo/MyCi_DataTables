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

class Utiles extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
                
    }

    public function newitems(){
                
        $this->db->truncate('items');
        $this->db->truncate('subitems');
        $nro = 1000;                       
        $this->faker = Faker\Factory::create('es_ES');            
        //$this->faker = Faker\Factory::create();                
        for ($i = 1; $i <= $nro; $i++) {  
            $data = array(                        
                'item' => 'Item : '. $this->faker->vat.'-'.$this->faker->company,
                'texto_item' => 'Texto : '.$this->faker->text($maxNbChars = 120),
                'image_item' => $this->faker->imageUrl(640, 480),
                'iditem' => random_string('alnum', 32)
            );

            $this->Items_model->insert($data);
            for ($j = 1; $j <= 5; $j++) { 
            $data2 = array(
		'idsubitem' => random_string('alnum', 32),
		'id_item' => $i,
		'subitem' => 'SubItem de '.$data['item'],
		'texto_subitem' => 'Texto : '.$this->faker->text($maxNbChars = 120),
		'image_subitem' => $this->faker->imageUrl(640, 480),
	    );

            $this->Subitems_model->insert($data2);
            }
        }//for
            
        redirect(site_url('items'));
    }
   
}

