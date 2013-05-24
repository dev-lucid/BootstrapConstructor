<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_data_column extends bsc_widget
{
	function init()
	{
		$this->option_order = array('label','name','width','sortable','child');
		$this->options['tag'] = 'td';
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
	
	function render_width($data = array())
	{		
		$html = '<col width="'.$this->options['width'].'" />';
		return $html;
	}	
	function render_header($data = array())
	{		
		$html = '<th';
		
		$html .= ' data-column="'.$this->options['name'].'"';
		$html .= ' class="'.$this->parent->attributes['id'].'-col';
		
		if($this->options['sortable'])
		{
			$html .= ' bsc-data-table-sort';
			if($this->parent->options['sort_column'] == $this->options['name'])
			{
				$html .= ' bsc-data-table-sort-'.$this->parent->options['sort_direction'];
			}
		}
		
		$html .= '"';
		
		$html .= ' onclick="bsc.widget.dataTable.objs[\''.$this->parent->attributes['id'].'\'].changeSort(\''.$this->options['name'].'\');"';
		
		$html .='>'.$this->attributes['data-label'].'</th>';
		return $html;
	}
}

?>