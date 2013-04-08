<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

abstract class bsc_widget
{
	public function __construct($type,$options=array())
	{
		$this->parent = null;
		$this->children = array();
		$this->events = array();
		$this->tag = '';
		$this->type = $type;
		$this->options = array(
			'css'=>array(),
			'style'=>'',
		);
		$this->init();
		$this->options = $this->options($options);
	}
	
	public function init()
	{
	}
	
	public function __call($option_name,$parameters)
	{
		if(count($parameters) == 0)
		{
			return $this->options[$option_name];
		}
		else
		{
			$this->option($option_name,$parameters[0]);
			return $this;
		}
		
	}
	
	public function options($options)
	{
		foreach($options as $name=>$value)
		{
			$this->option($name,$value);
		}
		return $this->options;
	}
	
	public function option($name,$value=null)
	{
		$events = array('onclick','onkeydown','onkeyup','onmouseover','onmouseout','onchange');
		switch($name)
		{
			case 'span':
				$this->options['span'] = $value;
				break;
			case 'class':
				$this->options['css'][$value] = true;
				break;
			case 'style':
				$this->options['style'] .= $value;
				break;
			default:
				if(in_array($name,$events))
				{
					if(!isset($this->events[$name]))
						$this->events[$name] = '';
					$this->events[$name] .= $value;
				}
				else
				{
					$this->options[$name] = $value;
				}
				break;
		}
		return $this;
	}
	
	public function add()
	{
		$params = func_get_args();
		for($i=0;$i<count($params);$i++)
		{
			if(is_array($params[$i]))
			{
				$this->add($params[$i]);
			}
			else if (is_object($params[$i]))
			{
				$params[$i]->parent =& $this;
				$this->children[] = $params[$i];
			}
			else
			{
				$widget = bsc::create($params[$i],$params[$i+1]);
				$widget->parent =& $this;
				$this->children[] = $widget;
				$i++;
			}

		}
	}
	
	protected function get_css()
	{
		$html = '';
		
		if(isset($this->options['span']) && is_numeric($this->options['span']))
		{
			$this->options['css']['span'.$this->options['span']] = true;
		}
		
		$classes = array_keys($this->options['css']);
		if(count($classes) > 0)
			$html .= ' class="'.implode(' ',$classes).'"';
		if($this->options['style'] != '')
			$html .= ' style="'.$this->options['style'].'"';
		return $html;
	}
	
	protected function get_events()
	{
		$html = '';
		foreach($this->events as $type=>$js)
		{
			$html .= ' '.$type.'="'.$js.'"';
		}
		return $html;
	}
	
	public function render($data=array())
	{
		$html = $this->render_start($data);
		$html .= $this->render_children($data);
		$html .= $this->render_end($data);
		return $html;
	}
	
	protected function render_start($data=array())
	{
		return '<'.$this->tag.$this->get_css().$this->get_events().'>';
	}
	
	protected function render_children($data=array())
	{
		$html = '';
		foreach($this->children as $child)
		{
			$html .= $child->render($data);
		}
		return $html;
	}
	
	protected function render_end($data=array())
	{
		return '</'.$this->tag.'>';
	}
}

?>