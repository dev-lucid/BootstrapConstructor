<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_nav_item extends bsc_widget
{
	function init()
	{
		$this->option_order = array('text','link','active','preicon','posticon');
		$this->options['tag'] = 'li';
		$this->option('text','');
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'active':
				$this->options['active'] = $value;
				break;
			case 'dropdown':
				$this->class('dropdown');
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start()
	{
		global $__bsc;
		
		if($this->options['active'] === true)
			$this->class('active');
			
		$html = parent::render_start();
		$html .= '<a href="'.$this->options['link'].'">';
		$html .= $this->__render_icon('pre');
		$html .= $this->__translate($this->options['text']);
		$html .= $this->__render_icon('post');
		$html .= '</a>';
		return $html;
	}
}

?>