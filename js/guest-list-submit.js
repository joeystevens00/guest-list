$(document).ready(function() {
$("input[value=Submit]").click(function() {
first = $("input.first[id=" + fidid +"]").val();
last = $("input.last[id=" + fidid +"]").val();
phone = $("input.phone[id=" + fidid + "]").val();
address = $("input.address[id=" + fidid + "]").val();
fid=fidid;
if (last == '' || phone == '' || address == '' || fid == '') {
$( "#validation" ).show();
} else {
// Returns successful data submission message when the entered information is stored in database.
$.post("php/guest-list-update.php", {
phone: phone,
first: first,
last: last,
address: address,
fid: fid
}, function(data) {
$( "#success" ).show();
location.reload();

});
}
});
});
