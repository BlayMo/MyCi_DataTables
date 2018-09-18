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
            <label for="varchar">Item <?php echo form_error('item') ?></label>
            <input type="text" class="form-control" name="item" id="item" placeholder="Item" value="<?php echo $item; ?>" />
        </div>
	    <div class="form-group">
            <label for="texto_item">Texto Item <?php echo form_error('texto_item') ?></label>
            <textarea class="form-control" rows="3" name="texto_item" id="texto_item" placeholder="Texto Item"><?php echo $texto_item; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Image Item <?php echo form_error('image_item') ?></label>
            <input type="text" class="form-control" name="image_item" id="image_item" placeholder="Image Item" value="<?php echo $image_item; ?>" />
        </div>
	    <input type="hidden" name="id_item" value="<?php echo $id_item; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('items') ?>" class="btn btn-default">Cancel</a>
	</form>
    
