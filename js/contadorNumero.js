$(document).on("input", "#matricula", function () {
    var limite = 10;
    var numerosDigitados = $(this).val().length;
    var numerosRestantes = limite - numerosDigitados;
    $(".numeros").text(numerosRestantes);
});

