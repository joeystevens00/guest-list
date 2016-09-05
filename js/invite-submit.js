$(document).ready(function() {
$("#submit").click(function() {
var first = $("#first").val();
var last = $("#last").val();
if (first == '' || last == '') {
$( "#validation" ).show();
} else {
// Returns successful data submission message when the entered information is stored in database.
$.post("php/invitee-table-update.php", {
first: first,
last: last
}, function(data) {
$('#form')[0].reset(); // To reset form fields
$( "#success" ).show();
});
}
});
});
