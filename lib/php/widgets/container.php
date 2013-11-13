<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_container extends bsc_widget
{
	function init()
	{
		$this->option_order = array('width');
		$this->options['tag'] = 'div';
		$this->options['width'] = null;
		$this->class('container');
	}
	
	function render_start($data=array())
	{
		if(!is_null($this->options['width']))
		{
			$this->style('width: '.$this->options['width'].';margin-left: auto;margin-right:auto;');
		}
		return parent::render_start($data);
	}
}

?>