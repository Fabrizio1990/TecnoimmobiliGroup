jQuery.extend(jQuery.validator.messages, {
    required: "Questo campo è obbligatorio",
    remote: "Please fix this field.",
    email: "Inserisci un indirizzo email valido",
    url: "Inserisci un URL valido",
    date: "Inserisci una data valida",
    dateISO: "Inserisci una data in formato (ISO).",
    number: "Inserisci un numero",
    digits: "Please enter only digits.",
    creditcard: "Inserisci un numero di carta di credito valido",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Inserisci non più di {0} caratteri."),
    minlength: jQuery.validator.format("Inserisci almeno {0} caratteri."),
    rangelength: jQuery.validator.format("Inserisci un valore compreso tra {0} e {1} caratteri."),
    range: jQuery.validator.format("Inserisci un valore compreso tra {0} e {1}."),
    max: jQuery.validator.format("Inserisci un valore minore o uguale a {0}."),
    min: jQuery.validator.format("Inserisci un valore maggiore o uguale a {0}.")
});