<?php
$html = '';

$html .= bsc::construct('address')->render()."\n";
$html .= bsc::construct('address')
	->title('test address1')
	->address1('100 n. main st')
	->address2('apt 3')
	->city('anywhere')
	->region('new york')
	->postal_code('12345')
	->phone('111.222.3333')
	->fax('444.555.6666')
	->email('testemail@testemail.notreal')
	->render()."\n";
$html .= bsc::construct('address')->render(array(
	'address1'=>'200 s. main st',
	'city'=>'nowhere',
	'region'=>'california',
))."\n";
$html .= bsc::construct('address')
	->option('fields',array(
		'address1'=>'test_address_1',
		'city'=>'test_municipality',
		'region'=>'test_state',
	))->render(array(
		'test_address_1'=>'100 Everywhere st',
		'test_municipality'=>'Detroit',
		'test_state'=>'Michigan',
))."\n";


file_put_contents($output_path,$html);
?>