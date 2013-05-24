<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_input_checkbox extends bsc_widget_input
{
	function init()
	{
		$this->option_order = array('name','text');
		$this->options['tag'] = '';
		$this->attributes['type'] = 'checkbox';
		$this->options['text'] = '';
		$this->option('checked',false);
		$this->class('input-with-feedback');
	}
	
	function render_start($data)
	{
		if($this->options['checked'])
			$this->attributes['checked'] = 'checked';
			
		$html = '<input'.$this->get_attributes() . ' />';
		$html .= $this->options['text'];
		
		$html .= $this->__help_block();
		
		return $html;
	}
}

?>