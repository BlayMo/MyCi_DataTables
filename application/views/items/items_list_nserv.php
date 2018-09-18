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
            <div class="col-md-4">
                <h2 style="margin-top:0px">Datatables/Items List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('items/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <code><?=$isql?></code><br/>
        <table class="table table-bordered table-responsive" id="mytable">
            <caption><strong>Simple implementaci&oacute;n de DataTables (No Server-side)</strong></caption>
            <thead>
                <tr>
                    <th>No</th>
		    <th>Item</th>
		    <th>Texto Item</th>
		    <th>Image Item</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
                       
            while ($items = $iquery->unbuffered_row())   
            {
                ?>
                <tr>
		    <td><?php echo $items->id_item ?></td>
		    <td><?php echo $items->item ?></td>
		    <td><?php echo $items->texto_item ?></td>
		    <td><a href="<?php echo $items->image_item ?>" target="_blank">Imagen</a></td>
		    <td style="text-align:center">
			<?php $this->load->view('items/items_action',array('items' => $items))?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        <script src="<?php echo base_url('assets/js/jquery-2.2.4.min.js') ?>"></script>
        <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            $("#mytable").dataTable({                
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
