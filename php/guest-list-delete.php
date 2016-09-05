<?php 
include 'auth.php';
$fid = $_POST["fid"];

echo shell_exec(escapeshellcmd("guest-list-delete.sh $fid $user $password $server $db"));
?>
