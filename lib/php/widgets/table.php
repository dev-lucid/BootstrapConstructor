<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_table extends bsc_widget
{
	function init()
	{
		$this->options['tag'] = 'table';
		$this->option('class','table');
	}
	
	function render_start()
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
		
		return $html;
	}
	
}

?>