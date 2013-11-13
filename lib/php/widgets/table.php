<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_table extends bsc_widget
{
	function init()
	{
		$this->option_order = array('widths','labels','caption');
		$this->options['tag'] = 'table';
		$this->options['data'] = null;
		$this->option('class','table');
	}
	
	function render_start($data=array())
	{
		$html = parent::render_start();
		
		if(isset($this->options['caption']))
		{
			$html .= '<caption>'.$this->options['caption'].'</caption>';
		}
		
		if(isset($this->options['widths']) && is_array($this->options['widths']))
		{
			foreach($this->options['widths'] as $width)
			{
				$html .= '<col width="'.$width.'" />';
			}
		}
		
		if(isset($this->options['labels']) && is_array($this->options['labels']))
		{
			$html .= '<thead>';
			foreach($this->options['labels'] as $label)
			{
				if(is_object($label))
				{
					$html .= '<th>'.$label->render($data).'</th>';
				}
				else
				{
					$html .= '<th>'.$label.'</th>';
				}
			
			}
			$html .= '</thead>';
		}
		
		$html .= '<tbody>';
		
		if(!is_null($this->options['data']))
		{
			foreach($this->options['data'] as $row)
			{
				$html .= '<tr>';
				foreach($row as $col)
				{
					$html .= '<td>';
					if(is_object($col))
					{
						$html .= $col->render($data);
					}
					else
					{
						$html .= $col;
					}
					$html .= '</td>';
				}
				$html .= '</tr>';
			}
		}
		
		return $html;
	}
	
	function render_end($data=array())
	{
		$html = '</tbody>';
		$html .= parent::render_end($data);
		return $html;
	}
}

?>