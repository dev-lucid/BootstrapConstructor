<?php
$html = '';

$html .= bsc::row()->render();
$html .= bsc::construct('row',array('fluid'=>false))->render();
$html .= bsc::row()->option('fluid',true)->option('fluid',false)->render();
$html .= bsc::row()->option('fluid',true)->option('fluid',false)->option('fluid',true)->render();
file_put_contents($output_path,$html);
?>