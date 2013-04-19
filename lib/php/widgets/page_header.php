<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_page_header extends bsc_widget
{
	function init()
	{
		$this->default_option = 'heading';
		$this->options['tag'] = 'div';
		$this->option('heading','');
		$this->option('level',1);
		$this->option('subtext','');
		$this->option('class','page-header');
	}

	
	function render_start($data = array())
	{			
		$html = parent::render_start($data);
		$html .= '<h'.$this->options['level'].'>' . $this->options['heading'];
		return $html;
	}
	
	function render_end($data = array())
	{			
		$html = '';	
		
		if($this->options['subtext'] != '')
			$html .= ' <small>'.$this->options['subtext'].'</small>';

		$html .= '</h'.$this->options['level'].'>';
		
		$html .= parent::render_start($data);
		return $html;
	}
		
}

?>