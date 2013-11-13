<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_hr extends bsc_widget
{
	
	function render_start($data = array())
	{			
		return '<hr />';
	}
	
	function render_end($data = array())
	{			
		return '';
	}
		
}

?>