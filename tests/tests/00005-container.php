<?php
$html = '';

$html .= bsc::construct('container')->render();
$html .= bsc::construct('container',array('fluid'=>false))->render();
$html .= bsc::construct('container')->option('fluid',true)->option('fluid',false)->render();
$html .= bsc::construct('container')->option('fluid',true)->option('fluid',false)->option('fluid',true)->render();
file_put_contents($output_path,$html);
?>