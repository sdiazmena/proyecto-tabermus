$(document).ready(function() {
    var text_max = 300;
    $('#textarea_feedback').html(text_max + ' Caracteres restantes');

    $('#textarea').keyup(function () {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' Caracteres restantes');
    });
});