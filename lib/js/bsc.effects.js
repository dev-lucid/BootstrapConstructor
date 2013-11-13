bsc.effects={
	'delayedFadeout_handles':{}
};

bsc.effects.delayedFadeout=function(id,time){
	$('#'+id).show();
	window.clearTimeout(bsc.effects.delayedFadeout_handles[id]);
	bsc.effects.delayedFadeout_handles[id] = window.setTimeout(
		Function('',"$('#"+id+"').hide(300);"),
		time
	);
};