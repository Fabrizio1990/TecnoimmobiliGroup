var validator = $("#FORM_LOGIN").validate({
  errorClass: "my-error-class",
  validClass: "my-valid-class",
  rules: {
    email: {
      required: true,
      email: true
    },
    password: {
      required: true,
    }
  },
   errorPlacement: function(error, element) {
      error.insertBefore(element.parent());
  },
  submitHandler: function(form) {
        $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function(response) {
				response = response.trim();
				console.log(response);
				switch(response){
					case "0":
						validator.showErrors({
						"email": "Username o password errati"});
						break;
					case "1":
						location.href="index.php"; 
						break;
					case "2":
					validator.showErrors({
						"email": "E' avvenuto un errore durante il login"});
						break;
					default :
						validator.showErrors({
						"email": "E' avvenuto un errore errore sconosciuto"});
						break;
				}
            },
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
			}   
        });
    }
});