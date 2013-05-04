<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_data_field_map extends bsc_widget
{
	function init()
	{
		$this->option_order = array('template');
	}
	
	function render($data)
	{
		bsc::log(print_r($data,true));
		$html = $this->options['template'];
		foreach($data as $key=>$value)
		{
			$html = str_replace('{'.$key.'}',$value,$html);
		}
		return $html;
	}
}

?>