<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_page extends bsc_widget
{
	function init()
	{
		$this->default_option = 'title';
		$this->options['tag'] = 'body';
		
		$this->options['author'] = '';
		$this->options['title'] = '';
		$this->options['description'] = '';
		$this->options['keywords'] = '';
		
		$this->options['css'] = array();
		$this->options['js'] = array();
		
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'js':
			case 'css':
				if(is_array($value))
					foreach($value as $include)
						$this->options[$name][] = $include;
				else
					$this->options[$name][] = $value;
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
		$html = '<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />';
		
		$html .= '<title>'.$this->options['title'].'</title>';
		$html .= '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />';
		$html .= '<meta name="description" content="'.$this->options['description'].'" />';
		$html .= '<meta name="keywords" content="'.$this->options['keywords'].'" />';
		$html .= '<meta name="author" content="'.$this->options['author'].'" />';
		
		foreach($this->options['css'] as $css)
		{
			$html .= '<link rel="stylesheet" href="'.$css.'" />';
		}

		foreach($this->options['js'] as $js)
		{
			$html .= '<script language="Javascript" src="'.$js.'"></script>';
		}
		$html .= '</head>';
		
		$html .= parent::render_start();
		
		
		return $html;
	}
	
	function render_end($data)
	{
		return parent::render_start($data).'</html>';
	}
}

?>