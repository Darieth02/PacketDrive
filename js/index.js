$(document).ready(function () {
    $('#menu-toggle').click(function () {
        console.log("Botón de menú clickeado");
        $('#main-menu').toggleClass('active');
    });
});
