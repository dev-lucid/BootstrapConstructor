<?php

class bsc
{
	function create($type,$options=array())
	{
		$class = 'bsc_widget_'.$type;
		$path  = __DIR__.'/widgets/'.$type.'.php';
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
