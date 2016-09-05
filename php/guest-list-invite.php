<?php 
include 'auth.php';
$phone= $_POST["phone"];
$first= $_POST["first"];
$last = $_POST["last"];
$address = $_POST["address"];

echo shell_exec(escapeshellcmd("guest-list-invite.sh \"$phone\" \"$last\" \"$address\" \"$first\" $user $password $server $db"));
?>
