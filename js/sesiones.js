function iniciarSesion() {
    $.ajax({
        data: $("#iniciarSesion").serialize(),
        url: 'Dao/InicioSecion.php',
        type: 'post',
        beforeSend: function() {
            $("#rp").html("Validando el codigo");
        },
        success: function(response, ) {
            $("#rp").html(response)
            
        }
    });
    // }
}