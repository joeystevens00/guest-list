<?php
include 'php/auth.php';
$db = new mysqli($server, $user, $password, $db);

$sql = <<<SQL
select contact.fid, family.last_name, contact.phone, contact.address from contact join family on family.fid=contact.fid where (phone is null or phone="") limit 1
SQL;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

if($result->num_rows === 0) { ?>
<div id="emptyset">There is currently no family contact information to update. Please consider adding an <a href="invite.php">invitee</a>  </div>

<?php 
}

while($row = $result->fetch_assoc()){
    if ($row['phone'] == NULL)
	$lastname=$row['last_name'];  
	$fid=$row['fid'];
}
?>
