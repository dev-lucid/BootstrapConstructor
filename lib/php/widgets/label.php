<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_label extends bsc_widget
{
	function init()
	{
		$this->default_option = 'text';
		$this->options['tag'] = 'span';
		$this->option('text','');
		$this->option('class','label');
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			
			case 'emphasis':
				$this->options['css']['label-'.$value] = true;
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data = array())
	{		
		$html = parent::render_start($data);
		$html .= $this->__translate($this->options['text']);
		return $html;
	}
}

?>