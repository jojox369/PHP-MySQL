$(document).on("input", "#renavam", function () {
    var limite = 11;
    var numerosDigitados = $(this).val().length;
    var numerosRestantes = limite - numerosDigitados;
    $(".renavam").text(numerosRestantes);
});