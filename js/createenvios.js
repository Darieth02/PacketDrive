$(document).ready(function () {
    cargarProductos();

    $("#formulario-envios").submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "agregar_envio.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response);
                cargarProductos();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});

