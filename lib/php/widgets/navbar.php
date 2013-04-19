<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_navbar extends bsc_widget
{
	function init()
	{
		$this->default_option = 'type';
		$this->class('navbar');
		$this->options['tag'] = 'div';
		$this->options['responsive'] = true;
		$this->options['brand'] = null;
		$this->options['brand_url'] = null;
	}

	function render_start($data)
	{
		global $__bsc;
		
		$html = parent::render_start($data);
		$html .= '<div class="navbar-inner">';
		
		if($this->options['responsive'] == true)
		{
			$html .= '<div class="container">';
			$html .= '<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>';
			
			$html .= $this->__render_brand();
			
			$html .= '<div class="nav-collapse collapse">';
		}
		else
		{
			$html .= $this->__render_brand();
		}
		
		return $html;
	}
	
	protected function __render_brand()
	{
		$html = '';
		if(is_string($this->options['brand']))
		{
			$this->options['brand'] = bsc::anchor($this->options['brand'])->class('brand')->href($this->options['brand_url']);
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
		
		$html = '</div>';

		if($this->options['responsive'] == true)
			$html .= '</div></div>';

		$html = parent::render_end($data);
		
		return $html;
	}
	
}

?>