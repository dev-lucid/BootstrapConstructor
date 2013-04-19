<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_alert extends bsc_widget
{
	function init()
	{
		$this->default_option = 'title';
		$this->options['tag'] = 'div';
		$this->option('title','');
		$this->option('level',4);
		$this->option('text','');
		
		$this->options['close_button'] = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		$this->options['render_close'] = true;
		
		$this->option('class','alert');
	}

	function option($name,$value)
	{
		switch($name)
		{
			case 'block':
				$this->options['css']['alert-block'] = true;
				break;
			case 'emphasis':
				$this->options['css']['alert-'.$value] = true;
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
		
		if($this->options['render_close'])
			$html .= $this->options['close_button'];
		
		$html .= '<h'.$this->options['level'].'>' . $this->options['title'].'</h'.$this->options['level'].'>';
		$html .= $this->options['text'];
		return $html;
	}		
}

?>