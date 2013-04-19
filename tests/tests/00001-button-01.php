<?php
$button = bsc::button('button-01');
file_put_contents($output_path,$button->render());
?>