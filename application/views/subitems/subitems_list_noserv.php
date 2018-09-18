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
    <?php $this->load->view('items_header')?>
<body>
    <?php $this->load->view('items_navbar')?>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-6">
                <h2 style="margin-top:0px">No Server-side/Subitems List</h2>
            </div>
            <div class="col-md-6 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            
        </div>
        <code><?=$isql?></code><br/>
        <table class="table table-bordered table-responsive" id="smytable">
            <caption><strong>Simple implementaci&oacute;n de DataTables (No Server-side)</strong></caption>
            <thead>
                <tr>
                    <th>No</th>
		    
		    <th>Id Item</th>
		    <th>Subitem</th>
		    <th>Texto Subitem</th>
		    <th>Image Subitem</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            
            
            while ($subitems = $iquery->unbuffered_row())       
            {
                ?>
                <tr>
		    <td><?php echo $subitems->id_subitem ?></td>
		    
		    <td><?php echo $subitems->id_item ?></td>
		    <td><?php echo $subitems->subitem ?></td>
		    <td><?php echo $subitems->texto_subitem ?></td>
		    <td><a href="<?php echo $subitems->image_subitem ?>" target="_blank">Imagen</a></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('subitems/read/'.$subitems->id_subitem),$this->config->item('btn_read')); 
			//echo ' | '; 
			echo anchor(site_url('subitems/update/'.$subitems->id_subitem),$this->config->item('btn_update')); 
			//echo ' | '; 
			echo anchor(site_url('subitems/delete/'.$subitems->id_subitem),$this->config->item('btn_del'),'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php $this->load->view('items_script')?>
        <script type="text/javascript">
        $(document).ready(function () {
            $("#smytable").dataTable({                
                "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todo"] ],
                "responsive": true,
                "searching": true,
                "ordering": true,                
                "processing": true,
                "language": {
                "url": "<?=base_url()?>assets/datatables/spanish.json"
            }
            });              
        });        
      </script>
        
    </body>
</html>
