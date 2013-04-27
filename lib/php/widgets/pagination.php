<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_pagination extends bsc_widget
{
	function init()
	{
		$this->default_option = 'pages';
		$this->class('pagination');
		$this->options['tag'] = 'div';
		$this->options['pages'] = 0;
		$this->options['onpagechange'] = null;
		
		$this->options['render_first'] = true;
		$this->options['render_previous'] = true;
		$this->options['render_next'] = true;
		$this->options['render_last'] = true;
		
		$this->options['first'] = '<i class="icon-step-backward">&nbsp;</i>';
		$this->options['previous'] = '<i class="icon-backward">&nbsp;</i>';
		$this->options['next'] = '<i class="icon-forward">&nbsp;</i>';
		$this->options['last'] = '<i class="icon-step-forward">&nbsp;</i>';
	}
	
	function __pager($dir)
	{
		if(is_null($this->options['onpagechange']))
			return '';
		else
			return ' onclick="'.$this->options['onpagechange']($dir).'"';
	}

	function render_start($data)
	{
		global $__bsc;
		
		$html = parent::render_start($data);
		$html .= '<ul>';
		
		
		if($this->options['render_first'] == true)
			$html .= '<li><a'.$this->__pager('first').'>'.$this->options['first'].'</a></li>';
		if($this->options['render_previous'] == true)
			$html .= '<li><a'.$this->__pager('previous').'>'.$this->options['previous'].'</a></li>';
			
		for($i=1;$i<=$this->options['pages']; $i++)
		{
			$html .= '<li><a';
			$html .= $this->__pager($i);
			$html .= '>'.$i.'</a></li>';
		}
		
		if($this->options['render_next'] == true)
			$html .= '<li><a'.$this->__pager('next').'>'.$this->options['next'].'</a></li>';
		if($this->options['render_last'] == true)
			$html .= '<li><a'.$this->__pager('last').'>'.$this->options['last'].'</a></li>';
	
		return $html;
	}
	
	function render_end($data)
	{
		global $__bsc;
		
		$html = '</ul>';
		$html .= parent::render_end($data);
		
		return $html;
	}
	
}

?>