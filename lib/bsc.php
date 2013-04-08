<?php

global $__bsc_widget_search_paths;
$__bsc_widget_search_paths = array(
	__DIR__.'/widgets/',
);

class bsc
{
	public static function create($type,$options=array())
	{
		global $__bsc_widget_search_paths;
		$class = 'bsc_widget_'.$type;
		$path  = $__bsc_widget_search_paths[0].$type.'.php';
		if(!class_exists($class) && file_exists($path))
		{
			require_once($path);
		}
		
		if(!class_exists($class))
		{
			throw new Exception('Unable to create bsc widget: '.$type);
		}
		
		$widget = new $class($type,$options);
		return $widget;
	}
}

require_once(__DIR__.'/bsc_widget.php');

?>