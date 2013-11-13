<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_navbar extends bsc_widget
{
	function init()
	{
		$this->option_order = array('type','brand','brand_url','width','inverse');
		$this->class('navbar');
		$this->options['tag'] = 'div';
		$this->options['responsive'] = true;
		$this->options['brand'] = null;
		$this->options['brand_url'] = null;
		$this->options['width'] = null;
		$this->options['inverse'] = false;
		$this->options['type'] = '';
		$this->options['form'] = null;
		$this->attributes['role'] = 'navigation';
		
	}
	
	function add_form($form_obj)
	{
		$this->options['form'] = $form_obj;
		$this->options['form']->class('navbar-form navbar-left');
		return $this; 
	}

	function option($name,$value=null)
	{
		switch($name)
		{
			case 'type':
				$this->options['type'] = $value;
				
				break;
			case 'inverse':
				if($value == true)
					$this->options['inverse'] = true;
				break;
			default:
				return parent::option($name,$value);
				break;
		}
		return $this;
	}

	function render_start($data)
	{
		global $__bsc;
		
		if($this->options['type'] != '')
			$this->class('navbar-'.$this->options['type']);
		$this->class(($this->options['inverse'] == true)?'navbar-inverse':'navbar-default');
		
		$html = parent::render_start($data);

		if(!is_null($this->options['width']))
		{
			$html .= '<div class="container" style="width: '.$this->options['width'].';margin-left:auto;margin-right: auto;">';
		}
		
		$html .= '<div class="navbar-header">';
		

		if($this->options['responsive'] == true)
		{
			
			$html .= '
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
			';
			
			$html .= $this->__render_brand();
			
		}
		else
		{
			$html .= $this->__render_brand();
		}
		$html .= '</div>';
		$html .= '<div class="collapse navbar-collapse navbar-ex1-collapse">';
		$html .= '<ul class="nav navbar-nav">';
		
		return $html;
	}
	
	protected function __render_brand()
	{
		$html = '';
		if(is_string($this->options['brand']))
		{
			$this->options['brand'] = bsc::anchor($this->options['brand'])->class('navbar-brand')->href($this->options['brand_url']);
		}
		if(is_object($this->options['brand']))
		{
			$html .= $this->options['brand']->render($data);
		}
		
		return $html;
	}
	
	function render_end($data)
	{
		global $__bsc;
		
		$html = '</ul>';
		
		if(!is_null($this->options['form']))
		{
			$html .= $this->options['form']->render($data);
		}
		
		if(!is_null($this->options['width']))
		{
			$html .= '</div>';
		}
		
		$html .= '</div>';
		$html .= parent::render_end($data);
		
		return $html;
	}
	
}

?>