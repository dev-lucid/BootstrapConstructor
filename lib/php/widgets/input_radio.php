<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

if(!class_exists('bsc_widget_input_checkbox'))
{
	include(__DIR__.'/input_checkbox.php');
}

class bsc_widget_input_radio extends bsc_widget_input_checkbox
{
	function init()
	{
		$this->default_option = 'name';
		$this->options['tag'] = '';
		$this->attributes['type'] = 'radio';
		$this->option('checked',false);
	}
}

?>