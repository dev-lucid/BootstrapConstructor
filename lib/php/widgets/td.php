<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_td extends bsc_widget
{
	function init()
	{
		$this->option_order = array('text');
		$this->options['tag'] = 'td';
		$this->options['text'] = '';
	}
	
	function render_start()
	{
		global $__bsc;
		$html = parent::render_start();
		$html .= $this->__render_icon('pre');
		$html .= $this->__translate($this->options['text']);
		$html .= $this->__render_icon('post');
		return $html;
	}
}

?>