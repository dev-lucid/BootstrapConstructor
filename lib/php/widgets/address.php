<?php
# Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

class bsc_widget_address extends bsc_widget
{
	function init()
	{
		$this->options['tag'] = 'address';
		$this->option('title','');
		$this->option('address1','');
		$this->option('address2','');
		$this->option('address3','');
		$this->option('city','');
		$this->option('region','');
		$this->option('postal_code','');
		$this->option('country','');
		$this->option('phone','');
		$this->option('fax','');
		$this->option('email','');
		$this->option('phone_prefix','T: ');
		$this->option('fax_prefix','F: ');
		$this->option('email_prefix','<i class="icon-envelope"></i>');
		
		# this option can be used to add aliases for fields
		$this->option('fields',array(
			'title'=>'title',
			'address1'=>'address1',
			'address2'=>'address2',
			'address3'=>'address3',
			'city'=>'city',
			'region'=>'region',
			'postal_code'=>'postal_code',
			'country'=>'country',
			'phone'=>'phone',
			'fax'=>'fax',
			'email'=>'email',
		));
		
		$this->option('render_order',array('title','address1','address2','address3','city_region_postal_code','country','phone','fax','email'));
		$this->option('separator','<br />');
	}

	protected function __get_value($data,$to_render)
	{
		$val = (array_key_exists($to_render,$this->options))?$this->options[$to_render]:null;
		if(array_key_exists($this->options['fields'].'',$data) && array_key_exists($to_render,$data[$this->options['fields']]))
		{
			if( $data[$this->options['fields'][$to_render]] != '' )
				$val = $data[$this->options['fields'][$to_render]];
		}
		return $val;
	}

	function render_start($data)
	{
		$html = parent::render_start($data);
		
		
		foreach($this->options['render_order'] as $to_render)
		{
			$val = $this->__get_value($data,$to_render);
			switch($to_render)
			{
				case 'title':
					if($val != '')
						$html .= '<strong>'.$val.'</strong>'.$this->options['separator'];
					break;
				case 'address1':
				case 'address2':
				case 'address3':
				case 'country':
					if($val != '')
						$html .= $val.$this->options['separator'];
					break;
				case 'city_region_postal_code':
					$val = $this->__get_value($data,'city');
					$region = $this->__get_value($data,'region');
					$postal = $this->__get_value($data,'postal_code');
					if($val != '')
					{
						$html .= $val;
						if($region != '')
						{
							$html .= ', '.$region;
						}
						if($postal != '')
						{
							$html .= ' '.$postal;
						}
						$html .= $this->options['separator'];
					}
					break;
				case 'phone':
				case 'fax':
					if($val != '')
						$html .= $this->options[$to_render.'_prefix'].$val.$this->options['separator'];
					break;
				case 'email':
					if($val != '')
						$html .= $this->options['email_prefix'].'<a href="mailTo:'.$val.'">'.$val.'</a>'.$this->options['separator'];
					break;
				default:
					$html .= $val.$this->options['separator'];
					break;
			}
		}
		
		return $html;
	}
}

?>