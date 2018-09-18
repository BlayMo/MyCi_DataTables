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
         <h2 style="margin-top:0px">P&aacute;ginas/Listado de SubItems</h2>
      </div>
      <div class="col-md-6 text-center">
         <div style="margin-top: 4px"  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
         </div>
      </div>
   </div>
   <table class="table table-bordered table-responsive" >
      <caption><strong>Simple script de paginaci&oacute;n. No se emplea Datatables</strong></caption>
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
            
            foreach ($subitems_data as $subitems)
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
                    echo anchor(site_url('subitems/update/'.$subitems->id_subitem),$this->config->item('btn_update'));                     
                    echo anchor(site_url('subitems/delete/'.$subitems->id_subitem),$this->config->item('btn_del'),'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
         </tr>
         <?php
            }
            ?>
         <div class="text-right">
            <?=$pagination; ?>
         </div>
   </table>
    <p class="text-left"><?=$info?></p>
   <div class="text-right">
      <?=$pagination; ?>
   </div>
     
   <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
   <script src="<?php echo base_url('assets/js/jquery-2.2.4.min.js') ?>"></script>
   <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
</body>
</html>

    
