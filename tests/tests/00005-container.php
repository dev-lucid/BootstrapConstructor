<?php
$html = '';

$html .= bsc::container()->render();
$html .= bsc::construct('container',array('fluid'=>false))->render();
$html .= bsc::container()->option('fluid',true)->option('fluid',false)->render();
$html .= bsc::container()->option('fluid',true)->option('fluid',false)->option('fluid',true)->render();
file_put_contents($output_path,$html);
?>