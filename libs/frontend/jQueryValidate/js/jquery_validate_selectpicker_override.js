$(document).ready(function () {
	 // ADD VALIDATOR ONCHANGE becouse validator dont detect select2Change
    $(".select2").selectpicker().change(function() {
        $(this).valid();
    });

	jQuery.validator.setDefaults({
        highlight: function (element, errorClass, validClass) {
            if ($(element).is('select')) {
                $(element).next().children("button").addClass(errorClass).removeClass(validClass);
            } else {
                $(element).addClass(errorClass).removeClass(validClass);
            }
        },
        unhighlight: function (element, errorClass, validClass) {
            if ($(element).is('select')) {
                $(element).next().children("button").removeClass(errorClass).addClass(validClass);
            } else {
                $(element).removeClass(errorClass).addClass(validClass);
            }
        },
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());      // radio/checkbox?
            } else if (element.hasClass('selectpicker')) {
                error.insertAfter(element.next('div'));  // select2
            } else {
                error.insertAfter(element);               // default
            }
        },
		/*success: function (label, element) {
            $(element).parent().removeClass('has-error');
        },*/
	});
	
});