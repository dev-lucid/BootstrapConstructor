<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_input_textarea extends bsc_widget_input
{
	function init()
	{
		$this->default_option = 'name';
		$this->options['tag'] = 'textarea';
		$this->option('rows',3);
		$this->option('cols',null);
	}
	
	function render_start($data)
	{
		$html = '<textarea'.$this->get_attributes();
		
		if(is_numeric($this->options['rows']))
			$html .= ' rows="'.$this->options['rows'].'"';
			
		if(is_numeric($this->options['cols']))
			$html .= ' cols="'.$this->options['cols'].'"';
			
		$html .= '>';
		$html .= $this->options['value'];
		
		return $html;
	}
}

?>