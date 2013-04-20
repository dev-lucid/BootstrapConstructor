<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_nav_tabbable extends bsc_widget
{
	function init()
	{
		$this->default_option = 'name';
		
		$this->class('tabbable');
		$this->options['name'] = '';
		$this->options['tag'] = 'div';
		$this->options['current'] = 0;
		
		$this->add(
			bsc::nav('tabs'),
			bsc::div()->class('tab-content')
		);
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'position':
				$this->options['css']['tabs-'.$value] = true;
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function add_tab($label,$content)
	{
		if($this->options['name'] == '')
			$this->options['name'] = 't'.md5(microtime());
		
		$new_id = $this->options['name'].'-'.count($this->children[0]->children);
	
		$label = bsc::list_item()->add(
			bsc::anchor($label)
				->attribute('data-target','#'.$new_id)
				->attribute('data-toggle','tab')
		);
		
		$content = bsc::div()->class('tab-pane')
			->id($new_id)
			->add(
				( (is_object($content))? $content : bsc::text($content) )
			);
		
		
		
		$this->children[0]->add($label);
		$this->children[1]->add($content);
		return $this;
	}
	
	function render_start($data)
	{
		global $__bsc;
		
		# set the active attribute for the correct tab label / pane
		$this->children[0]->children[$this->options['current']]->class('active');
		$this->children[1]->children[$this->options['current']]->class('active');
		
		return parent::render_start($data);
	}
}

?>