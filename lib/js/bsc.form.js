bsc.form={};

bsc.form.clearErrors=function(formObj){
	for(var i=0;i<formObj.elements.length;i++){
		var obj = $(formObj.elements[i]).parent().parent();
		if(obj.hasClass('has-error')){
			obj.removeClass('has-error').addClass('has-success');
		}
	}
};

bsc.form.showErrors=function(formObj,errorList){
	var first = true;
	for(var inputName in errorList){
		var obj = $(formObj[inputName]).parent().parent();
		obj.removeClass('has-success').addClass('has-error');
		if(first)
			formObj[inputName].focus();
		first = false;
	}
};
