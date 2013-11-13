<?php
$widget = bsc::hero_unit(
	'CSS',
	'Basic CSS'
);
echo($widget->render());

$layout = bsc::row()->add(
	bsc::column(array(null,12,5,3),array(),array(true,null,null,null))->add(
		bsc::well()->add(
			bsc::nav()->add(
				bsc::nav_item('Tabs','#Tabs'),
				bsc::nav_item('Pills','#Pills'),
				bsc::nav_item('Stacked','#Stacked'),
				bsc::nav_item('Breadcrumbs','#Breadcrumbs'),
				bsc::nav_item('Pager','#Pager'),
				bsc::nav_item('Navbar','#Navbar'),
				bsc::nav_item('Dropdowns','#Dropdowns')
			)
		)
	),
	bsc::column(array(12,12,7,9))->add(
		bsc::well()->add(
			bsc::div()->add(
				bsc::local_anchor('Tabs'),
				bsc::heading('Tabs')
			)
		)
	)
);

echo($layout->render());

?>