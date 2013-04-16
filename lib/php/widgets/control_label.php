<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_control_label extends bsc_widget
{
	function init()
	{
		$this->default_option = 'label';
		$this->options['tag'] = 'label';
		$this->class('control-label');
		$this->options['for'] = '';
		$this->options['label'] = '';
	}
	
	function render_start($data = array())
	{
		$html = '<label'.$this->get_attributes();
		
		
		if($this->options['for'] != '')
		{
			$html .= ' for="'.$this->options['for'].'"';
		}
		
		$html .= '>'.$this->options['label'].'</label>';
		
		return $html;
	}
}

?>