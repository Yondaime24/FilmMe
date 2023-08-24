$(function(){
	var $formMessage = $("#gcashform");

	$.validator.addMethod("noSpace", function(value, element){
		return value == '' || value.trim().length != 0
	}, "Spaces are not allowed!");
	
	$.validator.addMethod("usernamevalues", function (value, element){
		return this.optional(element) || /^[a-zA-Z0-9\.\_\@\s]+$/i.test(value);
	}, "Must consist of alphabetical, numeric, dot, @ or underscore only!");

	$.validator.addMethod("lettersonly", function (value, element){
		return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
	}, "Must consist of letters only!");

	$.validator.addMethod("numbersonly", function (value, element){
		return this.optional(element) || /^[0-9]+$/i.test(value);
	}, "Must consist of numbers!");

	$.validator.addMethod("addressvalues", function (value, element){
		return this.optional(element) || /^[a-zA-Z0-9\.\-\,\s]+$/i.test(value);
	}, "Must consist of alphabetical, numeric, dot, - or underscore only!");

	if ($formMessage.length) {
		$formMessage.validate({
			rules:{
				gcash_account:{
					required: true
				}
			},
			messages:{
				gcash_account:{
					required: 'GCash account required!',
				}
			},
			errorPlacement: function(error, element){
				error.appendTo(element.parents(".validate"));
			}
		})
	}
})