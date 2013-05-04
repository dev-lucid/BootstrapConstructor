<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_list_definition_item extends bsc_widget
{
	function init()
	{
		$this->option_order = array('term','description');
		$this->options['term_tag'] = 'dt';
		$this->options['description_tag'] = 'dd';
		$this->option('term','');
		$this->option('description','');
	}
	
	function render_start()
	{		
		$html = parent::render_start();
		
		$html .= '<'.$this->options['term_tag'].'>';
		$thml .= $this->__translate($this->options['term']);
		$html .= '</'.$this->options['term_tag'].'>';
		
		$html .= '<'.$this->options['description_tag'].'>';
		$thml .= $this->__translate($this->options['description']);
		$html .= '</'.$this->options['description_tag'].'>';

		return $html;
	}
}

?>