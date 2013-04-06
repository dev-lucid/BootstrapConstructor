<?

class bsc_widget_heading extends bsc_widget
{
	function init()
	{
		$this->option('level',1);
		$this->option('text','');
	}
	
	function render_start()
	{
		$this->tag = 'h'.$this->options['level'];
		$html = parent::render_start();
		$html .= $this->options['text'];
		return $html;
	}
}

?>