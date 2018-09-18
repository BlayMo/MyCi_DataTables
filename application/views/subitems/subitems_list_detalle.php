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
    
        <table class="table table-bordered table-responsive" id="mytabledet">
            <thead>
                <tr>
                    <th>No</th>
		    
		    <th>Id Item</th>
		    <th>Subitem</th>
		    <th>Texto Subitem</th>
		    <th>Image Subitem</th>
		    
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($subitems_data as $subitems)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    
		    <td><?php echo $subitems->id_item ?></td>
		    <td><?php echo $subitems->subitem ?></td>
		    <td><?php echo $subitems->texto_subitem ?></td>
		    <td><a href="<?php echo $subitems->image_subitem ?>" target="_blank">Imagen</a></td>
		   
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
