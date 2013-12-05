<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_pagination extends bsc_widget
{
	function init()
	{
		$this->option_order = array('pages','current_page','pages_before','pages_after','onpagechange');
		$this->class('pagination');
		$this->options['tag'] = 'ul';
		$this->options['pages'] = 0;
		$this->options['current_page'] = 0;
		$this->options['onpagechange'] = null;
		
		$this->options['render_first'] = true;
		$this->options['render_previous'] = true;
		$this->options['render_next'] = true;
		$this->options['render_last'] = true;
		
		$this->options['type'] = 'numbers';
		
		$this->options['first'] = '<i class="fa fa-step-backward">&nbsp;</i>';
		$this->options['previous'] = '<i class="fa fa-backward">&nbsp;</i>';
		$this->options['next'] = '<i class="fa fa-forward">&nbsp;</i>';
		$this->options['last'] = '<i class="fa fa-step-forward">&nbsp;</i>';
	}
	
	function __pager($dir)
	{
		if(is_null($this->options['onpagechange']))
			return '';
		else
			return ' onclick="'.$this->options['onpagechange'].'(\''.$dir.'\');"';
	}

	function render_start($data)
	{
		global $__bsc;
		
		$html = parent::render_start($data);
		
		
		if($this->options['render_first'] == true)
			$html .= '<li><a'.$this->__pager('first').'>'.$this->options['first'].'</a></li>';
		if($this->options['render_previous'] == true)
			$html .= '<li><a'.$this->__pager('previous').'>'.$this->options['previous'].'</a></li>';
	
		$start_page = $this->options['current_page'] - $this->options['pages_before'];
		if($start_page < 0)
			$start_page = 0;
		$end_page = $this->options['current_page'] + $this->options['pages_before'];
		if($end_page > $this->options['pages'])
			$end_page = $this->options['pages'];
			
		if($this->options['type'] == 'numbers')
		{
		
			for($i=$start_page;$i<=$end_page; $i++)
			{
				if(isset($this->attributes['id']) && $this->attributes['id'] != '')
					$html .= '<li id="'.$this->attributes['id'].'-'.$i.'"';
				else
					$html .= '<li';
					
				if($i == $this->options['current_page'])
				{
					$html .= ' class="active"';
				}
					
				$html .= '><a';
				$html .= $this->__pager($i).'>';
				
				if($i == $start_page && $i > 0)
					$html .= '&hellip;';
				else if($i == $end_page && $end_page < $this->options['pages'])
					$html .= '&hellip;';
				else
					$html .= ($i + 1);
				$html .= '</a></li>';
			}
		}
		else if ($this->options['type'] == 'selector')
		{
			$html .= '<li id="'.$this->attributes['id'].'-selector" class="dropdown">';
			$html .= '<a data-target="#" class="dropdown-toggle" role="button" id="dLabel" data-toggle="dropdown" onlick="">Page '.($this->options['current_page'] + 1).' of '.$this->options['pages'].'</a>';
			$html .= '<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">';
			for($i=0;$i<$this->options['pages']; $i++)
			{
				$html .= '<li role="presentation" data-page="'.$i.'"><a role="menuitem"'.$this->__pager($i).'>Page '.($i + 1).' of '.$this->options['pages'].'</a></li>';
			}
			$html .= '</ul>';
			$html .= '</li>';
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
		
		$html .= parent::render_end($data);
		
		return $html;
	}
	
}

?>