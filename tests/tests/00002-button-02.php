<?php
$button = bsc::create('button',array(
	'label'=>'button-02',
	'emphasis'=>'warning',
));
file_put_contents($output_path,$button->render());
?>