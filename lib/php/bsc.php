<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

global $__bsc;
$__bsc= array(
	'widget_search_paths'=>array(__DIR__.'/widgets/'),
	'events'=>array('onclick','onkeydown','onkeyup','onmouseover','onmouseout','onchange','onfocus','onblur','onsubmit','onload'),
	'hooks'=>array(
		'js'=>function($content){
			return '<script language="Javascript">'.$content.'</script>';
		},
	),
	'initial_js'=>'',
	'id_positions'=>array(),
	'autooptions'=>array(
	),
);

class bsc
{
	function log($to_write)
	{
		global $__bsc;
		if(isset($__bsc['hooks']['log']))
		{
			$to_write=(is_object($to_write) || is_array($to_write))?print_r($to_write,true):$to_write;
			$__bsc['hooks']['log']('BSC: '.$to_write);
		}
	}
	
	function call_hook($hook,$p0=null,$p1=null,$p2=null,$p3=null,$p4=null,$p5=null,$p6=null)
	{
		global $__bsc;
		if(isset($__bsc['hooks'][$hook]))
			return $__bsc['hooks'][$hook]($p0,$p1,$p2,$p3,$p4,$p5,$p6);
	}
	
	public static function init($config = array())
	{
		global $__bsc;
		
		foreach($config as $key=>$value)
		{
			if(is_array($value))
			{
				foreach($value as $subkey=>$subvalue)
				{
					if(is_numeric($subkey))
						$__bsc[$key][] = $subvalue;
					else
						$__bsc[$key][$subkey] = $subvalue;
				}
			}
			else
				$__bsc[$key] = $value;
		}
	}
	
	public static function deinit()
	{
	}
	
	public static function construct($type='')
	{
		global $__bsc;
		
	
		$class = 'bsc_widget_'.$type;
		$path  = $__bsc['widget_search_paths'][0].$type.'.php';
		if(!class_exists($class) && file_exists($path))
		{
			bsc::log('loading widget class file: '.$type);
			require_once($path);
		}
		
		if(!class_exists($class))
		{
			throw new Exception('BSC: Unable to create bsc widget: '.$type.'/'.$class);
		}
		
		$a = func_get_args();
		array_shift($a);
		$arg_count = count($a);
		
		switch($arg_count)
		{
			case 0:
				$widget = new $class($type);
				break;
			case 1:
				$widget = new $class($type,$a[0]);
				break;
			case 2:
				$widget = new $class($type,$a[0],$a[1]);
				break;
			case 3:
				$widget = new $class($type,$a[0],$a[1],$a[2]);
				break;
			case 4:
				$widget = new $class($type,$a[0],$a[1],$a[2],$a[3]);
				break;
			case 5:
				$widget = new $class($type,$a[0],$a[1],$a[2],$a[3],$a[4]);
				break;
			case 6:
				$widget = new $class($type,$a[0],$a[1],$a[2],$a[3],$a[4],$a[5]);
				break;
			case 7:
				$widget = new $class($type,$a[0],$a[1],$a[2],$a[3],$a[4],$a[5],$a[6]);
				break;
			case 8:
				$widget = new $class($type,$a[0],$a[1],$a[2],$a[3],$a[4],$a[5],$a[6],$a[7]);
				break;
		}
		return $widget;
	}
	
	public static function __callStatic($type,$a)
	{
		$arg_count = count($a);
		switch($arg_count)
		{
			case 0:
				return bsc::construct($type);
				break;
			case 1:
				return bsc::construct($type,$a[0]);
				break;
			case 2:
				return bsc::construct($type,$a[0],$a[1]);
				break;
			case 3:
				return bsc::construct($type,$a[0],$a[1],$a[2]);
				break;
			case 4:
				return bsc::construct($type,$a[0],$a[1],$a[2],$a[3]);
				break;
			case 5:
				return bsc::construct($type,$a[0],$a[1],$a[2],$a[3],$a[4]);
				break;
			case 6:
				return bsc::construct($type,$a[0],$a[1],$a[2],$a[3],$a[4],$a[5]);
				break;
			case 7:
				return bsc::construct($type,$a[0],$a[1],$a[2],$a[3],$a[4],$a[5],$a[6]);
				break;
			case 8:
				return bsc::construct($type,$a[0],$a[1],$a[2],$a[3],$a[4],$a[5],$a[6],$a[7]);
				break;
		}
	}
}

require_once(__DIR__.'/bsc_widget.php');
require_once(__DIR__.'/bsc_widget_input.php');

?>