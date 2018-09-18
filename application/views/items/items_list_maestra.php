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
?>
        <table class="table table-bordered table-responsive" id="mytablemd">
            <caption>
                <strong>Simple implementacion de DataTables</strong>
            </caption>
            <thead>
                <tr>
                    <th>No</th>
		    
		    <th>
                        Item
                        <a href="<?=site_url('items/todo')?>" class="btn  btn-info btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></a>
                        
                    </th>
		    <th>Texto Item</th>
		    <th>Image Item</th>
		    
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($items_data as $items)
            {
                ?>
                <tr>
		    <td><?php echo $items->id_item?></td>
		   
		    <td>
                        <?php echo $items->item ?><br/>
                        <a href="<?=site_url('subitems/create/'.$items->id_item)?>" class="btn  btn-success btn-xs pull-right"><span class="glyphicon glyphicon-plus"></span> SubItem</a>
                        <a href="<?=site_url('items/detmd/'.$items->id_item)?>" class="btn  btn-primary btn-xs pull-left "><span class="ok"></span>  Detalle</a>
                    </td>
		    <td>
                        <?php echo $items->texto_item ?>
                        <?php if($recs === $items->id_item){                                                        
                            echo '<hr>';
                            $this->load->view('items/subtabla_subitems');
                        }?>
                    </td>
                    <td><a href="<?php echo $items->image_item ?>" target="_blank">Imagen</a></td>		    
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
    
