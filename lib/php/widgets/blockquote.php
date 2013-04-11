<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_blockquote extends bsc_widget
{
	function init()
	{
		$this->options['tag'] = 'blockquote';
		$this->option('text','');
		$this->option('source','');
		$this->option('source_title','');
	}
	
	function render_start()
	{
		$html = parent::render_start();
		$html .= '<p>'.$this->options['text'].'</p>';
		if($this->options['source'] != '')
		{
			$html .= '<small>'.$this->options['source'];
			if($this->options['source'] != '')
			{
				$html .= ' <cite title="'.$this->options['source_title'].'">'.$this->options['source_title'].'</cite>';
			}
			$html .= '</small>';
		}
		return $html;
	}
}

?>