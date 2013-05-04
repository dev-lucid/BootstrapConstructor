<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_modal extends bsc_widget
{
	function init()
	{
		$this->option_order = array('title');
		$this->options['tag'] = 'div';
		$this->class('modal-body');

		$this->header = bsc::heading()->class('modal-title')->id('bsc_modal_header')->level(4);
		$this->footer = bsc::div()->class('modal-footer');
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'title':
				$this->header->text($value);
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data)
	{
		global $__bsc;
		
		$html = bsc::div()->class('modal-header')->add(
			bsc::button('&times;')->class('close')->attribute('data-dismiss','modal')->attribute('aria-hidden','true'),
			$this->header
		)->render();
			
		return $html . parent::render_start($data);
	}
	
	function render_end($data)
	{
		global $__bsc;
		
		$html = $this->footer->render();
			
		return parent::render_end($data).$html;
	}
}

?>