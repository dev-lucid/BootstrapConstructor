<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

global $__bsc;
$__bsc= array(
	'widget_search_paths'=>array(__DIR__.'/widgets/'),
	'events'=>array('onclick','onkeydown','onkeyup','onmouseover','onmouseout','onchange','onfocus','onblur','onsubmit'),
	'log_hook'=>null,
);

class bsc
{
	public static function construct($type,$options=array())
	{
		global $__bsc;
		$class = 'bsc_widget_'.$type;
		$path  = $__bsc['widget_search_paths'][0].$type.'.php';
		if(!class_exists($class) && file_exists($path))
		{
			require_once($path);
		}
		
		if(!class_exists($class))
		{
			throw new Exception('BSC: Unable to create bsc widget: '.$type);
		}
		
		$widget = new $class($type,$options);
		return $widget;
	}
	
	public static function __callStatic($type,$options)
	{
		return bsc::construct($type,$options[0]);
	}
	
	function log($string_to_log)
	{
		global $__bsc;
		if(!is_null($__bsc['log_hook']))
		{
			$__bsc['log_hook']('BSC: '.$string_to_log);
		}
	}
}

require_once(__DIR__.'/bsc_widget.php');

?>