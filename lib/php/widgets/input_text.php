<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_input_text extends bsc_widget_input
{
	function init()
	{
		$this->option_order = array('name','prepend','append');
		$this->options['tag'] = '';
		$this->option_attributes[] = 'placeholder';
		
		$this->attributes['type'] = 'text';
		$this->class('input-with-feedback');
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
			$html .= '<div class="input-group">';
		}
		
		foreach($this->options['prepend'] as $prepend)
		{
			if(is_object($prepend))
				$html .= '<span class="input-group-btn">'.$prepend->render($data).'</span>';
			else
				$html .= '<span class="input-group-addon">'.$this->__translate($prepend).'</span>';
		}
		
		$html .= '<input'.$this->get_attributes() . ' />';
		
				
		foreach($this->options['append'] as $append)
		{
			if(is_object($append))
			{

				$html .= '<span class="input-group-btn">'.$append->render($data).'</span>';
			}
			else
			{
				$html .= '<span class="input-group-addon">'.$this->__translate($append).'</span>';
			}
		}
		
		if(($prepend_count + $append_count) > 0)
			$html .= '</div>';
		
		$html .= $this->__help_block();
		
		return $html;
	}

}

?>