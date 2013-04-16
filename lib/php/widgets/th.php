<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_th extends bsc_widget
{
	function init()
	{
		$this->default_option = 'text';
		$this->options['tag'] = 'th';
		$this->options['text'] = '';
	}
	
	function render_start()
	{
		$html = parent::render_start();
		$html .= $this->options['text'];
		return $html;
	}
}

?>