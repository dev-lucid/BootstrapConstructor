<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

if(!class_exists('bsc_widget_popover'))
{
	include(__DIR__.'/popover.php');
}

class bsc_widget_tooltip extends bsc_widget_popover
{
	private $parent = null;
	
	function init()
	{
		$this->default_option = 'title';
		
		$this->options['title'] = '';
		$this->options['placement'] = 'top';
		$this->options['trigger'] = 'hover'; # hover, focus, manual
		$this->options['tag'] = '';
		$this->options['popup-type'] = 'tooltip';
		
	}
}

?>