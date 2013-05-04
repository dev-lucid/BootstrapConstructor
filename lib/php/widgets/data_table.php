<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_data_table extends bsc_widget
{
	function init()
	{
		$this->option_order = array('url','data','name');
		$this->options['tag'] = 'div';
		$this->option('class','table');
	}
	
	function option($name,$value)
	{
		switch($name)
		{	
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data)
	{		
		$html = parent::render_start($data);
		$html .= '<div class="table-head">';
		foreach($this->children as $child)
		{
			$html .= $child->render_header($data);
		}
		$html .= '</div>';
		return $html;
	}
	
	function render_children($data)
	{
		$html = '';
		foreach($this->options['data'] as $data_row)
		{
			$html .= '<div class="row">';
			
			foreach($this->children as $child)
			{
				$row = (is_array($data_row))?$data_row:$data_row->row_array();
				$html .= $child->render($row);
			}
			
			$html .= '</div>';
		}
		return $html;
	}
	
	function render_end($data)
	{
		$html = '';
		$html .= parent::render_end($data);
		return $html;
	}
}

?>