<?

class bsc_widget_button extends bsc_widget
{
	function init()
	{
		$this->tag = 'a';
		$this->option('label','');
		$this->option('class','btn');
	}
	
	function option($name,$value)
	{
		switch($name)
		{
			case 'size':
			case 'emphasis':
				$this->options['css']['btn-'.$value] = true;
				break;
			default:
				parent::option($name,$value);
				break;
		}
		return $this;
	}
	
	function render_start($data = array())
	{
		$html = parent::render_start($data);
		$html .= $this->options['label'];
		return $html;
	}
}

?>