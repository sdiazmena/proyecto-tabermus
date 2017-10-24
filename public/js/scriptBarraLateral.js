$(document).ready(function () {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $("#menu-toggle-button").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
});
