<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_column extends bsc_widget
{
	function init()
	{
		$this->option_order = array('size','visible','hidden','offset','push','pull');
		$this->options['tag'] = 'div';
		$this->options['size']    = array();
		$this->options['visible'] = array();
		$this->options['hidden']  = array();
		$this->options['offset']  = array();
		$this->options['push']    = array();
		$this->options['pull']    = array();
	}
	
	
	function render_start($data = array())
	{
		if(count($this->options['size']) > 0)
		{
			if(is_numeric($this->options['size'][0]))
				$this->class('col-xs-'.$this->options['size'][0]);
			if(is_numeric($this->options['size'][1]))
				$this->class('col-sm-'.$this->options['size'][1]);
			if(is_numeric($this->options['size'][2]))
				$this->class('col-md-'.$this->options['size'][2]);
			if(is_numeric($this->options['size'][3]))
				$this->class('col-lg-'.$this->options['size'][3]);
		}
		if(count($this->options['visible']) > 0)
		{
			if($this->options['visible'][0] === true)
				$this->class('visible-xs');
			if($this->options['visible'][1] === true)
				$this->class('visible-sm');
			if($this->options['visible'][2] === true)
				$this->class('visible-md');
			if($this->options['visible'][3] === true)
				$this->class('visible-lg');
		}
		if(count($this->options['hidden']) > 0)
		{
			if($this->options['hidden'][0] === true)
				$this->class('hidden-xs');
			if($this->options['hidden'][1] === true)
				$this->class('hidden-sm');
			if($this->options['hidden'][2] === true)
				$this->class('hidden-md');
			if($this->options['hidden'][3] === true)
				$this->class('hidden-lg');
		}
		if(count($this->options['offset']) > 0)
		{
			if(is_numeric($this->options['offset'][0]))
				$this->class('col-xs-offset-'.$this->options['offset'][0]);
			if(is_numeric($this->options['offset'][1]))
				$this->class('col-sm-offset-'.$this->options['offset'][1]);
			if(is_numeric($this->options['offset'][2]))
				$this->class('col-md-offset-'.$this->options['offset'][2]);
			if(is_numeric($this->options['offset'][3]))
				$this->class('col-lg-offset-'.$this->options['offset'][3]);
		}
		if(count($this->options['push']) > 0)
		{
			if(is_numeric($this->options['push'][0]))
				$this->class('col-xs-push-'.$this->options['push'][0]);
			if(is_numeric($this->options['push'][1]))
				$this->class('col-sm-push-'.$this->options['push'][1]);
			if(is_numeric($this->options['push'][2]))
				$this->class('col-md-push-'.$this->options['push'][2]);
			if(is_numeric($this->options['push'][3]))
				$this->class('col-lg-push-'.$this->options['push'][3]);
		}
		if(count($this->options['pull']) > 0)
		{
			if(is_numeric($this->options['pull'][0]))
				$this->class('col-xs-pull-'.$this->options['pull'][0]);
			if(is_numeric($this->options['pull'][1]))
				$this->class('col-sm-pull-'.$this->options['pull'][1]);
			if(is_numeric($this->options['pull'][2]))
				$this->class('col-md-pull-'.$this->options['pull'][2]);
			if(is_numeric($this->options['pull'][3]))
				$this->class('col-lg-pull-'.$this->options['pull'][3]);
		}
		
		$html = parent::render_start($data);
		return $html;
	}
}

?>