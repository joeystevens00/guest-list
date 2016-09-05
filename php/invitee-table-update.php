#!/usr/local/bin/php
<?php 
include 'auth.php';
$db = new mysqli($server, $user, $password, $db);
$first= $_POST["first"];
$last = $_POST["last"];
$sql = <<<SQL
 insert into invitees (first_name, last_name) values ("$first", "$last")
SQL;
echo $sql;
shell_exec("sync-db.sh");
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
?>
