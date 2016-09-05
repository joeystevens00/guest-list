$(document).ready(function() {
$("input[value=Invite]").click(function() {
first = $("input.first#new").val();
last = $("input.last#new").val();
phone = $("input.phone#new").val();
address = $("input.address#new").val();
if (last == '' || phone == '' || address == '' || first == '') {
$( "#validation" ).show();
} else {
// Returns successful data submission message when the entered information is stored in database.
$.post("php/guest-list-invite.php", {
phone: phone,
first: first,
last: last,
address: address
}, function(data) {
$( "#success" ).show();
location.reload();
});
}
});
});
