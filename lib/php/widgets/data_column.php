<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_data_column extends bsc_widget
{
	function init()
	{
		$this->option_order = array('label','name','width','sortable','child');
		$this->options['tag'] = 'div';
		$this->option('class','column');
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'name':
				$this->options['name'] = $value;
				break;
			case 'label':
				$this->attributes['data-label'] = $value;
				break;
			case 'child':
				if(is_string($value))
					$value = bsc::data_field_map($value);
				$this->add($value);
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_header($data = array())
	{		
		$html = '<div class="column">'.$this->options['data-label'].'</div>';
		return $html;
	}
}

?>