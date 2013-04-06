<?php
$html = '';

$html .= bsc::create('container')->render();
$html .= bsc::create('container',array('fluid'=>false))->render();
$html .= bsc::create('container')->option('fluid',true)->option('fluid',false)->render();
$html .= bsc::create('container')->option('fluid',true)->option('fluid',false)->option('fluid',true)->render();
file_put_contents($output_path,$html);
?>