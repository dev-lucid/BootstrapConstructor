<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_progress extends bsc_widget
{
	function init()
	{
		$this->option_order = array('width','emphasis','striped');
		$this->options['tag'] = 'div';
		$this->options['width'] = 0;
		$this->class('progress');
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'striped':
				$this->class('progress-striped');
				break;
			case 'emphasis':
				$this->options['css']['progress-'.$value] = true;
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data = array())
	{
		if(count($this->children) == 0)
		{
			$this->add(
				bsc::progress_bar($this->options['width'])
			);
		}
		return parent::render_start($data);
	}
	
}

?>