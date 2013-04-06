<?php

include_once(__DIR__.'/../lib/bsc.php');

$nl = (isset($_SERVER['HTTP_HOST']))?'<br />':"\n";
echo('beginning test run'.$nl);

$button = bsc::create('button',array(
	'span'=>3,
	'label'=>'mike test button',
	'emphasis'=>'warning',
	'size'=>'large',
	'onclick'=>"alert('test');")
);

$button->option('span',6);
$button->options(array('span'=>4));


$heading = bsc::create('heading',array('text'=>'my header'));
$heading->option('level',3);
echo(htmlentities($button->render()));
echo(htmlentities($heading->render()));
?>