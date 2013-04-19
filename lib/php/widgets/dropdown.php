<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_dropdown extends bsc_widget
{
	function init()
	{
		$this->options['tag'] = 'ul';
		$this->options['css']['dropdown-menu'] = true;
		$this->attributes['role'] = 'menu';
		$this->attributes['aria-labelledby'] = 'dLabel';
	}
}

?>