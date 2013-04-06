<?

class bsc_widget_container extends bsc_widget
{
	function init()
	{
		$this->tag = 'div';
		$this->option('fluid',true);
	}
	
	function render_start($data=array())
	{
		if($this->options['fluid'] == true)
		{
			unset($this->options['css']['container']);
			$this->options['css']['container-fluid'] = true;
		}
		else
		{
			unset($this->options['css']['container-fluid']);
			$this->options['css']['container'] = true;
		}
		return parent::render_start($data);
	}
}

?>