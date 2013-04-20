<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_popover extends bsc_widget
{
	private $parent = null;
	
	function init()
	{
		$this->default_option = 'title';
		
		$this->options['title'] = '';
		$this->options['text'] = '';
		$this->options['placement'] = 'right';
		$this->options['trigger'] = 'click'; # hover, focus, manual
		$this->options['tag'] = '';
		$this->options['popup-type'] = 'popover';
		
	}
	
	public function __set($name, $value)
	{
		jvc::log('__set called: '.$name);
		$this->$name = $value;
		
		if($name == 'parent')
		{
			$value->attributes['data-toggle'] = $this->options['popup-type']; 
			$value->attributes['data-trigger'] = $this->options['trigger'];
			$value->attributes['data-title'] = $this->options['title'];
			$value->attributes['data-content'] = $this->options['text'];
			$value->attributes['data-placement'] = $this->options['placement'];
			$value->attributes['rel'] = $this->options['popup-type'];
		}
	}

	
	
	function render_start($data)
	{
		return '';
	}
	function render_children($data)
	{
		return '';
	}
	function render_end($data)
	{
		return '';
	}
}

?>