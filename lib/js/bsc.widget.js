bsc.widget=function(){};

bsc.widget.prototype.active=function(newState){
	$('#'+this.id)[((newState)?'addClass':'removeClass')]('active');
}
bsc.widget.prototype.size=function(newSize){
	$('#'+this.id)[((newState)?'addClass':'removeClass')]('newSize');
}

bsc.widget.breadcrumb=function(){};
bsc.widget.breadcrumb.prototype = new bsc.widget();

bsc.widget.pagination=function(){};
bsc.widget.pagination.prototype = new bsc.widget();

bsc.widget.badge=function(){};
bsc.widget.badge.prototype = new bsc.widget();

bsc.widget.label=function(){};
bsc.widget.label.prototype = new bsc.widget();

bsc.widget.button=function(){};
bsc.widget.button.prototype = new bsc.widget();

