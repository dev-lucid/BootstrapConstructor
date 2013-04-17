<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_input_text extends bsc_widget_input
{
	function init()
	{
		$this->default_option = 'name';
		$this->options['tag'] = '';
		$this->option('id','');
		$this->option('name','');
		$this->option('value','');
		$this->option('placeholder','');
		
		$this->options['prepend'] = array();
		$this->options['append'] = array();
	}
	
	function option($name,$value=null)
	{
		switch($name)
		{
			case 'prepend':
			case 'append':
				if(is_object($value) || is_string($value))
					$this->options[$name][] = $value;
				else
					throw new Exception('BSC: tried to append non-string or non-object to input_text');
				break;
			case 'size':
				$this->options['css']['input-'.$value] = true;
				break;
			default:
				return parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data)
	{
		$html = '';
		
		$prepend_count = count($this->options['prepend']);
		$append_count = count($this->options['append']);
		if(($prepend_count + $append_count) > 0)
		{
			$class = '';
			$class .= ($prepend_count > 0)?'input-prepend':'';
			$class .= ($class == '')?'':' ';
			$class .= ($append_count > 0)?'input-append':'';
			
			$html .= '<div class="'.$class.'">';
		}
		
		foreach($this->options['prepend'] as $prepend)
		{
			if(is_object($prepend))
				$html .= $prepend->render($data);
			else
				$html .= '<span class="add-on">'.$prepend.'</span>';
		}
		
		$html .= '<input type="text" '.$this->get_attributes();
		
		if($this->options['id'] != '')
			$html .= ' id="'.$this->options['name'].'"';
		if($this->options['name'] != '')
			$html .= ' name="'.$this->options['name'].'"';
		if($this->options['value'] != '')
			$html .= ' value="'.$this->options['value'].'"';
		if($this->options['placeholder'] != '')
			$html .= ' placeholder="'.$this->options['placeholder'].'"';
			
		$html .= ' />';
		
		foreach($this->options['append'] as $append)
		{
			if(is_object($append))
				$html .= $append->render($data);
			else
				$html .= '<span class="add-on">'.$append.'</span>';
		}
		
		if(($prepend_count + $append_count) > 0)
			$html .= '</div>';
		
		$html .= $this->__help_block();
		
		return $html;
	}

}

?>