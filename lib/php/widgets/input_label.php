<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_input_label extends bsc_widget
{
	function init()
	{
		$this->default_option = 'text';
		$this->options['tag'] = 'label';
		$this->option('text','');
	}
	
	function render_start()
	{
		global $__bsc;
		$html = parent::render_start();
		
		if(isset($this->options['css']['checkbox']))
		{
		}
		else
		{
			$html .= $this->__get_icon();
			$html .= $this->__translate($this->options['text']);
		
		}
			
		return $html;
	}
	
	protected function render_end($data=array())
	{
		global $__bsc;
		
		$html = '';
		if(isset($this->options['css']['checkbox']))
		{
			$html .= $this->__render_icon('pre');
			$html .= $this->__translate($this->options['text']);
			$html .= $this->__render_icon('post');
		}
		
		if($this->options['tag'] == '')
			return $html;
		$html .= '</'.$this->options['tag'].'>';
		
		return $html;
	}
}

?>