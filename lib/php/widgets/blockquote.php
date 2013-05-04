<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_blockquote extends bsc_widget
{
	function init()
	{
		$this->option_order = array('text','source','source_title');
		$this->options['tag'] = 'blockquote';
		$this->option('text','');
		$this->option('source','');
		$this->option('source_title','');
	}
	
	function render_start()
	{
		$html = parent::render_start();
		$html .= '<p>'.$this->__translate($this->options['text']).'</p>';
		if($this->options['source'] != '')
		{
			$html .= '<small>'.$this->__translate($this->options['source']);
			if($this->options['source'] != '')
			{
				$html .= ' <cite title="'.$this->__translate($this->options['source_title']).'">'.$this->__translate($this->options['source_title']).'</cite>';
			}
			$html .= '</small>';
		}
		return $html;
	}
}

?>