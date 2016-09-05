<?php 
include 'auth.php';
$phone= $_POST["phone"];
$first= $_POST["first"];
$last = $_POST["last"];
$fid = $_POST["fid"];
$address = $_POST["address"];

echo shell_exec(escapeshellcmd("guest-list-bash-update.sh \"$phone\" \"$last\" $fid \"$address\" \"$first\" $user $password $server $db"));
?>
