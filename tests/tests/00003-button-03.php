<?php
$button = bsc::create('button',array(
	'label'=>'button-03',
	'emphasis'=>'warning',
));
$button->option('size','large');
file_put_contents($output_path,$button->render());
?>