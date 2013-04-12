<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_input extends bsc_widget
{
	function __help_block()
	{
		if($this->options['help_block'] != '')
		{
			return '<span class="help-block">'.$this->options['help_block'].'</span>';
		}
		return '';
	}
}

?>