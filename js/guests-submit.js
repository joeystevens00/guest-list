$(document).ready(function() {
$("#submit").click(function() {
var phone = $("#phone").val();
var fid = $("#fid").val();
var address = $("#address").val();
if (phone == '' || address == '') {
$( "#success" ).hide();
$( "#validation" ).show();
} else {
// Returns successful data submission message when the entered information is stored in database.
$.post("php/guests-database-update.php", {
phone: phone,
address: address,
fid: fid
}, function(data) {
$('#form')[0].reset(); // To reset form fields

$( "#validation" ).hide();
$( "#success" ).show();
$("#family").load(location.href + " #family");
$("#fidrefresh").load(location.href + " #fid");

});
}
});
});
