$(document).ready(function () {
	 // ADD VALIDATOR ONCHANGE becouse validator dont detect select2Change
    $(".select2").select2().change(function() {
        $(this).valid();
    });

	jQuery.validator.setDefaults({
		highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass);
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass(errorClass);
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());      // radio/checkbox?
            } else if (element.hasClass('select2')) {
                error.insertAfter(element.next('span'));  // select2
            } else {
                error.insertAfter(element);               // default
            }
        },
		/*success: function (label, element) {
            $(element).parent().removeClass('has-error');
        },*/
	});
	
});