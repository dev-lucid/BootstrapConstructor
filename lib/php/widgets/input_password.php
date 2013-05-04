<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

if(!class_exists('bsc_widget_input_text'))
{
	include(__DIR__.'/input_text.php');
}

class bsc_widget_input_password extends bsc_widget_input_text
{
	function init()
	{
		$this->option_order = array('name');
		$this->options['tag'] = '';
		$this->attributes['type'] = 'password';
		$this->option('help_block','');
		$this->class('input-with-feedback');
	}
}

?>