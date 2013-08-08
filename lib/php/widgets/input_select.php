<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_input_select extends bsc_widget_input
{
	function init()
	{
		$this->option_order = array('name');
		$this->options['tag'] = 'select';
		$this->option('name','');
		$this->option('value','');
		$this->option('class','form-control');
		$this->options['default'] = null;
		$this->option('options',array());
		$this->option('colval','');
		$this->option('coltext','');
	}
	
	function option($name,$value=null)
	{
		bsc::log('option func called: '.$name);
		switch($name)
		{
			case 'multiple':
				bsc::log('multiple option set');
				if($value || is_null($value))
					$this->attributes['multiple']='multiple';
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data)
	{
		$html = '<select'.$this->get_attributes();
		$html .= '>';
		
		if(!is_null($this->options['default']))
		{
			$html .= '<option value="null">'.$this->options['default'].'</option>';
		}
		
		foreach($this->options['options'] as $idx=>$option)
		{
			if($this->options['colval'] == '')
			{
				$val = $idx;
			}
			else
			{
				$val = $option[$this->options['colval']];
			}
		
			$html .= '<option value="'.$val.'"';
			$html .= ($this->options['value'] == $val)?' selected="selected"':'';
			$html .= '>';

			
			if($this->options['coltext'] == '')
				$html .= $option;
			else
				$html .= $option[$this->options['coltext']];
			
			$html .= '</option>';
			
		}
		
		
		return $html;
	}
}

?>