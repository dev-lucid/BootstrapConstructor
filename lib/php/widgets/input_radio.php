<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_input_radio extends bsc_widget_input
{
	function init()
	{
		$this->default_option = 'name';
		$this->options['tag'] = '';
		$this->option('name','');
		$this->option('value','');
		$this->option('checked',false);
	}
	
	function render_start($data)
	{
		$html = '<input type="radio" '.$this->get_attributes();
		
		if($this->options['name'] != '')
			$html .= ' name="'.$this->options['name'].'"';
		if($this->options['value'] != '')
			$html .= ' value="'.$this->options['value'].'"';
		if($this->options['checked'])
			$html .= ' checked="checked"';
			
		$html .= ' />';
		
		$html .= $this->__help_block();
		
		return $html;
	}
}

?>