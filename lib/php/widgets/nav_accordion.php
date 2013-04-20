<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_nav_accordion extends bsc_widget
{
	function init()
	{
		$this->default_option = 'id';
		
		$this->attributes['id'] = '';
		$this->options['tag'] = 'div';
		$this->options['current'] = 0;
		$this->class('accordion');
		
		$this->tabs = array();
		$this->panes = array();
	}
	
	
	function add_group($label,$content)
	{
		if($this->attributes['id'] == '')
			$this->attributes['id'] = 'a'.md5(microtime());
		
		$content = (is_string($content))?bsc::text($content):$content;
		$idx = count($this->children);
		
		$new_label = bsc::anchor($label)
			->class('accordion-toggle')
			->attribute('data-toggle','collapse')
			->attribute('data-parent','#'.$this->attributes['id'])
			->attribute('data-target','#'.$this->attributes['id'].'-'.$idx);
		$new_body = bsc::div()
			->class('accordion-inner')
			->add($content);
		
		$this->tabs[] = $new_label;
		$this->panes[] = $new_body;
		
		$group = bsc::div()
			->class('accordion-group')
			->add(
			bsc::div()->class('accordion-heading')->add(
				$new_label
			),
			bsc::div()
				->class('accordion-body')
				->class('collapse')
				->id($this->attributes['id'].'-'.$idx)
				->add(
					$new_body
				)
		);
		
		$this->add($group);
		
		return $this;
	}
	
	function render_start($data)
	{
		global $__bsc;
		
		# set the active attribute for the correct tab label / pane
		$this->children[$this->options['current']]->children[1]->class('in');
		
		return parent::render_start($data);
	}
}

?>