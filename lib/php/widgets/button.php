<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_button extends bsc_widget
{
	function init()
	{
		$this->default_option = 'label';
		$this->options['tag'] = 'a';
		$this->option('label','');
		$this->option('class','btn');
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'toggleable':
				$this->attributes['data-toggle'] = 'button';
				break;
			case 'dropdown':
				$this->class('dropdown-toggle');
				break;
			case 'size':
			case 'emphasis':
				$this->options['css']['btn-'.$value] = true;
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data = array())
	{
		if(isset($this->options['css']['dropdown-toggle']))
			$this->attributes['data-toggle'] = 'dropdown';
			
		$html = parent::render_start($data);
		$html .= $this->__get_icon();
		$html .= $this->__translate($this->options['label']);
		if(isset($this->options['css']['dropdown-toggle']))
			$html .= ' <span class="caret"></span>';
		return $html;
	}
}

?>