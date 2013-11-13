<?php
$widget = bsc::jumbotron(
	'CSS',
	'Basic CSS'
);
echo($widget->render());

$layout = bsc::row()->add(
	bsc::column(array(null,12,5,3),array(),array(true,null,null,null))->add(
		bsc::well()->add(
			bsc::nav()->add(
				bsc::nav_item('Wells','#Wells'),
				bsc::nav_item('Jumbotron','#Jumbotron'),
				bsc::nav_item('Panels','#Panels')
			)
		)
	),
	bsc::column(array(12,12,7,9))->add(
		bsc::well()->add(
			bsc::div()->add(
				bsc::local_anchor('Wells'),
				bsc::heading('Wells',1),
				bsc::text('testing'),
				bsc::heading('Options',3),
				bsc::table(array('5%','15%','20%','60%'),array('#','Name','Passable','Description'))->data(
					array(
						array(
							1,'size','Yes','How big do you want your well. No default, pass either \'lg\' or \'sm\'.',
						),
					)
				),
				bsc::heading('Example 1 - Standard Well',3),
				bsc::well()->add(
					bsc::well()->add("some text")
				),
				bsc::heading('Code 1',3),
				bsc::code('
					echo(bsc::well()->add("some text"));
				'),
				bsc::heading('Example 2 - Smaller well',3),
				bsc::well()->add(
					bsc::well('sm')->add("some text")
				),
				bsc::heading('Code 2',3),
				bsc::code('
					echo(bsc::well("sm")->add("some text"));
				')
			),
			bsc::hr(),
			bsc::div()->add(
				bsc::local_anchor('Jumbotron'),
				bsc::heading('Jumbotron',1),
				bsc::text('testing'),
				bsc::heading('Options',3),
				bsc::table(array('5%','15%','20%','60%'),array('#','Name','Passable','Description'))->data(
					array(
						array(
							1,'title','Yes','The big text in the jumbotron. Defaults to blank.',
						),
						array(
							2,'tagline','Yes','The little text in the jumbotron. Defaults to blank.',
						),
						array(
							3,'level','Yes','The heading level of the big text. 1 through 9, which corresponds to &lt;h1&gt; through &lt;h9&gt;. Defaults to 1.',
						),
					)
				),
				bsc::heading('Example 1 - Standard big jumbotron',3),
				bsc::well()->add(
					bsc::jumbotron("Heading!","my jumbotron")
				),
				bsc::heading('Code 1',3),
				bsc::code('
					echo(bsc::jumbotron("Heading!","my jumbotron"));
				'),
				bsc::heading('Example 2 - Smaller jumbotron',3),
				bsc::well()->add(
					bsc::jumbotron("Slightly smaller!","my jumbotron",2)
				),
				bsc::heading('Code 2',3),
				bsc::code('
					echo(bsc::jumbotron("Heading!","my jumbotron",2));
				')
			),
			bsc::hr(),
			bsc::div()->add(
				bsc::local_anchor('Panels'),
				bsc::heading('Panels',1)
			)
		)
	)
);

echo($layout->render());

?>