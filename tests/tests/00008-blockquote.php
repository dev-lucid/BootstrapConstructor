<?php
$html = '';

$html .= bsc::blockquote('this is a quote 1')."\n";
$html .= bsc::construct('blockquote')->text('this is a quote 2')->source('now with a source')->render()."\n";
$html .= bsc::blockquote('this is a quote 2')->source('now with a source')->source_title('and a source title')->render()."\n";

file_put_contents($output_path,$html);
?>