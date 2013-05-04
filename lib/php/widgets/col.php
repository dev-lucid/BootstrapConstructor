<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_col extends bsc_widget
{
	function init()
	{
		$this->option_order = array('width');
		$this->options['width'] = 0;
	}
	
	function render_start()
	{
		$html = '<col width="'.$this->options['width'].'" />';
		return $html;
	}
}

?>