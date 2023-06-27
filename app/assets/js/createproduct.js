$(document).ready(function() {
    cargarProductos();

    $("#formulario-producto").submit(function(event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "agregar_producto.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response);
                cargarProductos();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});

function cargarProductos() {
    $.ajax({
        url: "obtener_productos.php",
        type: "GET",
        success: function(response) {
            $("#tabla-productos tbody").html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}