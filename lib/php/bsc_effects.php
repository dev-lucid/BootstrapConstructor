<?php

class bsc_effects
{
	public static function delayed_fadeout($id,$time=1200)
	{
		global $__bsc;
		$__bsc['hooks']['js']("bsc.effects.delayedFadeout('".$id."',".$time.");");
	}
}

?>