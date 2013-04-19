<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_progress_bar extends bsc_widget
{
	function init()
	{
		$this->default_option = 'width';
		$this->options['tag'] = 'div';
		$this->options['width'] = 0;
		$this->class('bar');
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'striped':
				$this->class('progress-striped');
				break;
			case 'emphasis':
				$this->options['css']['bar-'.$value] = true;
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data = array())
	{
		$this->style('width: '.$this->options['width'].'%');
		return parent::render_start($data);
	}
}

?>