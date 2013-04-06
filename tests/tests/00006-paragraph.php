<?php
$html = '';

$html .= bsc::create('paragraph',array('text'=>'test1'))->render();
$html .= bsc::create('paragraph',array('text'=>'test2','align'=>'center'))->render();
$html .= bsc::create('paragraph',array('text'=>'test3','align'=>'right'))->render();
$html .= bsc::create('paragraph',array('text'=>'test4','align'=>'left'))->render();
file_put_contents($output_path,$html);
?>