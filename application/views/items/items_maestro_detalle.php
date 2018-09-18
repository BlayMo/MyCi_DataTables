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

$this->load->view('items_header')?>
<body>
   <?php $this->load->view('items_navbar')?>
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3>Tabla Maestra</h3>
               </div>
               <div class="panel-body">
                  <div>
                     <?php $this->load->view('items/items_list_maestra')?> 
                     <?php //$this->load->view('items/items_list_server_md')?> 
                  </div>
               </div>
            </div>
         </div>
      </div>
      <hr />
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3>Tabla detalle</h3>
               </div>
               <div class="panel-body">
                  <div id="detalle">
                     <?php $this->load->view('subitems/subitems_list_detalle')?>   
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      <?php $this->load->view('items_script')?> 
   </div>
    <?php //$this->load->view('items_script')?> 
    <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable_md").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_md_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode === 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    processing: true,
                    serverSide: true,
                    "language": {"url": "<?=base_url()?>assets/datatables/spanish.json"},
                    ajax: {"url": "items/jsonmd", "type": "POST"},
                    columns: [
                        {
                            "data": "id_item",
                            "orderable": false
                        },
                        {"data": "item"},
                        {"data": "texto_item"},
                        {"data": "image_item"}
                        
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>    
   <script type="text/javascript">
      $(document).ready(function () {
          $("#mytablemd").dataTable({                
              "lengthMenu": [ [5], [5] ],
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
   <script type="text/javascript">
      $(document).ready(function () {
          $("#mytabledet").dataTable({                
              "lengthMenu": [ [5], [5] ],
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

 
