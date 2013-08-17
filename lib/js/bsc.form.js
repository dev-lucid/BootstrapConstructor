bsc.form={};

bsc.form.clearErrors=function(formObj){
	for(var i=0;i<formObj.elements.length;i++){
		var obj = $(formObj.elements[i]).parent().parent();
		$('.bsc-form-error-msg').hide();
		if(obj.hasClass('has-error')){
			obj.removeClass('has-error').addClass('has-success');
		}
	}
};

bsc.form.showErrors=function(formObj,errorList){
	var first = true;
	for(var inputName in errorList){
		//first, find the parent element with the 'form-control' class;
		var obj = $(formObj[inputName]);
		var errorParent = obj.parent();
		var doLoop = true;
		while(doLoop){
			if(errorParent.hasClass('form-group')){
				doLoop=false;
			}else{
				errorParent = errorParent.parent();
				if(!errorParent){
					doLoop=false;
				}
			}
		}
		var errorArea = errorParent.find('.bsc-form-error-msg[for='+inputName+']');
		if(errorArea.length < 1){
			errorParent.append('<div class="bsc-form-error-msg" for="'+inputName+'"></div>');
			errorArea = errorParent.find('.bsc-form-error-msg[for='+inputName+']');
		}
		errorArea.html(errorList[inputName]).show();
		obj.removeClass('has-success').addClass('has-error');
		if(first && typeof(formObj[inputName].focus) == 'function'){
			formObj[inputName].focus();
			first = false;
		}
	}
};
