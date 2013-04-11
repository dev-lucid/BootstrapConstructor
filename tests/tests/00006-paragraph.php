<?php
$html = '';

$html .= bsc::paragraph',array('text'=>'test1())->render()."\n";
$html .= bsc::paragraph',array('text'=>'test2','align'=>'center())->render()."\n";
$html .= bsc::paragraph',array('text'=>'test3','align'=>'right())->render()."\n";
$html .= bsc::paragraph',array('text'=>'test4','align'=>'left())->render()."\n";
$html .= bsc::paragraph',array('text'=>'test5','align'=>'right','emphasis'=>'warning())->render()."\n";
$html .= bsc::paragraph',array('text'=>'test6','align'=>'center','emphasis'=>'muted())->render()."\n";
file_put_contents($output_path,$html);
?>