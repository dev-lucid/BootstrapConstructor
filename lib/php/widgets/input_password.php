<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_input_password extends bsc_widget_input
{
	function init()
	{
		$this->default_option = 'name';
		$this->options['tag'] = '';
		$this->option('name','');
		$this->option('value','');
		$this->option('placeholder','');
		$this->option('help_block','');
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'size':
				$this->options['css']['input-'.$value] = true;
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data)
	{
		$html = '<input type="password"'.$this->get_attributes();
		
		if($this->options['name'] != '')
			$html .= ' name="'.$this->options['name'].'"';
		if($this->options['value'] != '')
			$html .= ' value="'.$this->options['value'].'"';
		if($this->options['placeholder'] != '')
			$html .= ' placeholder="'.$this->__translate($this->options['placeholder']).'"';
			
		$html .= ' />';
		
		$html .= $this->__help_block();

		return $html;
	}
}

?>