<?php

class bsc_widget_span extends bsc_widget
{
	function init()
	{
		$this->tag = 'span';
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