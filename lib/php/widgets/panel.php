<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_panel extends bsc_widget
{
	function init()
	{
		$this->option_order = array('title');
		$this->options['tag'] = 'div';
		$this->options['title'] = '';
		$this->class('panel');
	}
	
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'emphasis':
				$this->options['css']['panel-'.$value] = true;
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data)
	{
		$html = parent::render_start();
		
		if($this->options['title'] != '')
		{
			$html .= bsc::div($this->options['title'])->class('panel-heading')->render();
		}
		return $html;
	}
}

?>