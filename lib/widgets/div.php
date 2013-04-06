<?

class bsc_widget_div extends bsc_widget
{
	function init()
	{
		$this->tag = 'div';
		$this->option('text','');
	}
	
	function render_start()
	{
		$html = parent::render_start();
		$html .= $this->options['text'];
		return $html;
	}
}

?>