<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_image extends bsc_widget
{
	function init()
	{
		$this->option_order = array('src','width','height','alt');
		$this->options['tag'] = 'img';
		$this->options['base_path'] = '';
		
		$this->option_attributes[] = 'src';
		$this->option_attributes[] = 'alt';
		$this->option_attributes[] = 'width';
		$this->option_attributes[] = 'height';
		$this->attribute('border',0);

	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'shape':
				$this->options['css']['img-'.$value] = true;
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data = array())
	{
		if($this->options['base_path'] != '')
		{
			$this->attributes['src'] = $this->options['base_path'] . $this->attributes['src'];
		}
		return parent::render_start($data);
	}
}

?>