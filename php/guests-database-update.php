<?php 
include 'auth.php';
$db = new mysqli($server, $user, $password, $db);
$phone= $_POST["phone"];
$address = $_POST["address"];
$fid = $_POST["fid"];
$sql = <<<SQL
        update contact set phone="$phone", address="$address" where fid="$fid"
SQL;
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
?>
