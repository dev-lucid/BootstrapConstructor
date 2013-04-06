<?php

include(__DIR__.'/../lib/bsc.php');

$body = bsc::create('div');

$body->add(
	'heading',array(
		'text'=>'Bootstrap Constructor'
	),
	'paragraph',array(
		'text'=>'This is the bootstrap constructor documentation',
	)
);

$template = file_get_contents(__DIR__.'/template.html');
$final = str_replace('{content}',$body->render(),$template);
unlink(__DIR__.'/index.html');
file_put_contents(__DIR__.'/index.html',$final);
echo($final);

?>