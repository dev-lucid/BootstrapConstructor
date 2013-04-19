<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_nav extends bsc_widget
{
	function init()
	{
		$this->default_option = 'type';
		$this->class('nav');
		$this->options['tag'] = 'ul';
		$this->options['separator'] = '<span class="divider">/</span>';
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'type':
				if(!is_null($value) && $value != '')
				{
					if($value == 'breadcrumb')
					{
						unset($this->options['css']['nav']);
						$this->options['css']['breadcrumb'] = true;
					}
					else
					{
						$this->class('nav-'.$value);
					}
				}
				break;
			case 'stacked':
				$this->class('nav-'.$name);
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
		
		if(isset($this->options['css']['breadcrumb']) && $this->options['css']['breadcrumb'] == true)
		{
			for($i = 0; $i < (count($this->children) - 1); $i++)
			{
				$this->children[$i]->add(bsc::text($this->options['separator']));
			}
		}
		
		return parent::render_start($data);
	}
}

?>