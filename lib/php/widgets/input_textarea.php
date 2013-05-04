<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_input_textarea extends bsc_widget_input
{
	function init()
	{
		$this->option_order = array('name','rows','cols');
		$this->options['tag'] = 'textarea';
		$this->option_attributes[] = 'rows';
		$this->option_attributes[] = 'cols';
		$this->option('rows',3);
		$this->class('input-with-feedback');
	}
	
	function render_start($data)
	{
		$html = parent::render_start($data);
		$html .= $this->options['value'];	
		return $html;
	}
}

?>