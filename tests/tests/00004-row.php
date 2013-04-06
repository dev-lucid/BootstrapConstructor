<?php
$html = '';

$html .= bsc::create('row')->render();
$html .= bsc::create('row',array('fluid'=>false))->render();
$html .= bsc::create('row')->option('fluid',true)->option('fluid',false)->render();
$html .= bsc::create('row')->option('fluid',true)->option('fluid',false)->option('fluid',true)->render();
file_put_contents($output_path,$html);
?>