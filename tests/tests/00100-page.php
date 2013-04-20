<?php
$html = '';

$html .= bsc::page('my page')->onload("alert('loaded right!');")->author('Mike Thorn');

file_put_contents($output_path,$html);
?>