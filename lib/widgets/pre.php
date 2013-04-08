<?php

class bsc_widget_pre extends bsc_widget
{
	function init()
	{
		$this->tag = 'pre';
		$this->option('text','');
	}
	
	function render_start()
	{
		$html = parent::render_start();
		$html .= $this->options['text'];
		return $html;
	}
}

?>