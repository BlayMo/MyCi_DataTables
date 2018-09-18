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

        <form action="<?php echo $action; ?>" method="post">
	    
	    <div class="form-group">
            <label for="int">Id Item <?php echo form_error('id_item') ?></label>
            <input type="text" class="form-control" name="id_item" id="id_item" placeholder="Id Item" value="<?php echo $id_item; ?>" readonly />
        </div>
	    <div class="form-group">
            <label for="varchar">Subitem <?php echo form_error('subitem') ?></label>
            <input type="text" class="form-control" name="subitem" id="subitem" placeholder="Subitem" value="<?php echo $subitem; ?>" />
        </div>
	    <div class="form-group">
            <label for="texto_subitem">Texto Subitem <?php echo form_error('texto_subitem') ?></label>
            <textarea class="form-control" rows="3" name="texto_subitem" id="texto_subitem" placeholder="Texto Subitem"><?php echo $texto_subitem; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Image Subitem <?php echo form_error('image_subitem') ?></label>
            <input type="text" class="form-control" name="image_subitem" id="image_subitem" placeholder="Image Subitem" value="<?php echo $image_subitem; ?>" />
        </div>
	    <input type="hidden" name="id_subitem" value="<?php echo $id_subitem; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('subitems') ?>" class="btn btn-default">Cancel</a>
	</form>
    
