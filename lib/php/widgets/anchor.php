<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_anchor extends bsc_widget
{
	function init()
	{
		$this->default_option = 'text';
		$this->options['tag'] = 'a';
		$this->options['text'] = '';
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'dropdown':
				$this->class('dropdown-toggle');
				break;
			case 'href':
				$this->attributes['href'] = $value;
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
		if(isset($this->options['css']['dropdown-toggle']))
			$this->attributes['data-toggle'] = 'dropdown';
			
		$html = parent::render_start();
		$html .= $this->__render_icon('pre');
		$html .= $this->__translate($this->options['text']);
		
		if(isset($this->options['css']['dropdown-toggle']))
			$html .= ' <span class="caret"></span>';
			
		$html .= $this->__render_icon('post');

		return $html;
	}

}

?>