$(document).on("input", "#telefone", function () {
    var limite = 13;
    var numerosDigitados = $(this).val().length;
    var numerosRestantes = limite - numerosDigitados;
    $(".telefone").text(numerosRestantes);
});