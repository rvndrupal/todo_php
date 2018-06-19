$(obtener_registros());

function obtener_registros(alumnos) {
    $.ajax({
            url: 'consulta.php',
            type: 'POST',
            dataType: 'html',
            data: { alumnos: alumnos },
        })
        .done(function(resultado) {
            $("#tabla_resultado").html(resultado);
        })

} //obtener

$(document).on('keyup', '#busqueda', function() {
    var valBus = $(this).val();
    if (valBus != "") {
        obtener_registros(valBus);
    } else {
        obtener_registros();
    }
});