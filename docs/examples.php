<?php
include(__DIR__.'/../lib/php/bsc.php');

#$this->option_order = array('author','title','description','keywords','head_js','foot_js','css','javascript');
		
$page = bsc::page(
	'BootstrapConstructor Examples',
	'DevLucid',
	'',
	'',
	array(),
	array(
		'//code.jquery.com/jquery-1.10.1.min.js',
		'//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js',
	),
	array('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css'),
	''
);


try
{
	function load_page($page_to_include)
	{
		ob_start();
		include($page_to_include);
		return ob_get_clean();
	}


	if(!isset($_SERVER['REDIRECT_URL']))
		$_SERVER['REDIRECT_URL'] = '/landing.php';


	$page->add(
		
		bsc::navbar('static-top','BootstrapConstructor','examples.php','980px')->add(
			bsc::nav_item('Getting Started','getting_started.php',($_SERVER['REDIRECT_URL'] == '/getting_started.php')),
			bsc::nav_item('Panels','panels.php',($_SERVER['REDIRECT_URL'] == '/panels.php')),
			bsc::nav_item('Navigation','navs.php',($_SERVER['REDIRECT_URL'] == '/navs.php')),
			bsc::nav_item('Forms','forms.php',($_SERVER['REDIRECT_URL'] == '/forms.php'))
		),
		bsc::container('980px')->add(
			bsc::div()->add(load_page(__DIR__.'/pages'.$_SERVER['REDIRECT_URL']))
		)
	);
	echo($page->render());
}
catch(Exception $e)
{
	echo('Caught Exception! '.$e->getMessage());
}



?>