<?php

class bsc_widget_row extends bsc_widget
{
	function init()
	{
		$this->tag = 'div';
		$this->option('fluid',true);
	}
	
	function render_start($data=array())
	{
		if($this->options['fluid'] == true)
		{
			unset($this->options['css']['row']);
			$this->options['css']['row-fluid'] = true;
		}
		else
		{
			unset($this->options['css']['row-fluid']);
			$this->options['css']['row'] = true;
		}
		return parent::render_start($data);
	}
}

?>