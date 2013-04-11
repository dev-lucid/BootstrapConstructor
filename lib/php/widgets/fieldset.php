<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_fieldset extends bsc_widget
{
	function init()
	{
		$this->options['fieldset'] = 'p';
		$this->option('legend','');
	}
	
	function render_start()
	{
		$html = parent::render_start();
		
		if($this->options['legend'] != '')
			$html .= '<legend>'.$this->options['legend'].'</legend>';
			
		return $html;
	}
}

?>