<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_button_group extends bsc_widget
{
	function init()
	{
		$this->tag = 'div';
		$this->option('class','btn-group');
	}
}

?>