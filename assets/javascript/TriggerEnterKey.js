$(window).ready(function() {
$("#search-form").on("keypress", function (event) {
var keyPressed = event.keyCode || event.which;
if (keyPressed === 13) {
    event.preventDefault();
    document.getElementById("search-btn").click();
    return false;
}
});
});