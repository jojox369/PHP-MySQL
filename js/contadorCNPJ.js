$(document).on("input", "#cnpj", function () {
    var limite = 18;
    var cnpjDigitados = $(this).val().length;
    var cnpjRestantes = limite - cnpjDigitados;
    $(".cnpj").text(cnpjRestantes);
});