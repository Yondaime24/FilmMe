$(function(){
	var $registerForm = $("#contact_us");

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
	}, "Must consist of numbers only!");

	$.validator.addMethod("addressvalues", function (value, element){
		return this.optional(element) || /^[a-zA-Z0-9\.\-\,\s]+$/i.test(value);
	}, "Must consist of alphabetical, numeric, dot, - or underscore only!");

	if ($registerForm.length) {
		$registerForm.validate({
			rules:{
				fullname:{
					required: true,
					noSpace: true,
					lettersonly: true
				},
				email:{
					noSpace: true,
					required: true
				},
				contact_number:{
					required: true,
					noSpace: true,
					numbersonly: true
				},
				message:{
					required: true,
				}
			},
			messages:{
				fullname:{
					required: 'Please enter first name!'
				},
				email:{
					required: 'Please enter last name!'
				},
				contact_number:{
					required: 'Please select age!'
				}
			},
			errorPlacement: function(error, element){
				error.appendTo(element.parents(".validate"));
			}
		})
	}
})