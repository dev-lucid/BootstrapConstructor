<?

class bsc_widget_paragraph extends bsc_widget
{
	function init()
	{
		$this->tag = 'p';
		$this->option('text','');
	}
	
	function render_start()
	{
		if(isset($this->options['align']))
			$this->option('class','text-'.$this->options['align']);
		$html = parent::render_start();
		$html .= $this->options['text'];
		return $html;
	}
}

?>