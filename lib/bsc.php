<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

global $__bsc_widget_search_paths;
$__bsc_widget_search_paths = array(
	__DIR__.'/widgets/',
);

class bsc
{
	public static function construct($type,$options=array())
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
			throw new Exception('BSC: Unable to create bsc widget: '.$type);
		}
		
		$widget = new $class($type,$options);
		return $widget;
	}
}

require_once(__DIR__.'/bsc_widget.php');

?>