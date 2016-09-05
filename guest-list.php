<!DOCTYPE html>
<html>
<head>
<title>Guest Info</title>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/guest-list-submit.js"></script>
<script src="js/guest-list-invite.js"></script>
<script src="js/modal.js"></script>
<link href="css/guest-list.css" rel="stylesheet">
<link href="css/table.css" rel="stylesheet">
<link href="css/modal.css" rel="stylesheet">
</head>
<body>

<header>
  <button class="hamburger">&#9776;</button>
  <button class="cross">&#735;</button>
</header>

<div class="menu">
  <ul>
    <a href="guests.php"><li>Family Contact Info</li></a>
    <a href="invite.php"><li>Invite a Guest</li></a>
    <a href="#"><li>LINK THREE</li></a>
    <a href="#"><li>LINK FOUR</li></a>
    <a href="#"><li>LINK FIVE</li></a>
  </ul>
</div> 
<script>
$( ".cross" ).hide();
$( ".menu" ).hide();
$( ".hamburger" ).click(function() {
	$( ".menu" ).slideToggle( "slow", function() {
	$( ".hamburger" ).hide();
	$( ".cross" ).show();
	});
});

$( ".cross" ).click(function() {
	$( ".menu" ).slideToggle( "slow", function() {
	$( ".cross" ).hide();
	$( ".hamburger" ).show();
	});
});
</script>
<div id="contact-table">


<h3>Guest List</h3>

</div>
<label>
<table id="list">
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Phone</th>
<th>Address</th>
<th>Actions</th>
</tr>

<script>

$(document).ready(function(){
	$("a.hide").click(function () {
        	$("a.update[id=" + (this.id) + "]").show();
        	$("a.hide[id=" + (this.id) + "]").hide();
        	$("label[id=" + (this.id) + "]").show();
        	$("input[id=" + (this.id) + "]").hide();
        	$("td[colspan=4]." + (this.id)).hide();
                $("td[id=" + (this.id) + "]").show();
	
		return false;
	});

        $("a.printerfriendly").click(function () {
		$("h3").hide();
		$("a").hide();
		$("header").hide();
		$("*").css("background-color", "white");
		$("*").css("color",  "black");
		$("*").css("border-color", "white");
		$("#list > tbody:nth-child(1) > tr:nth-child(1) > th:nth-child(5)").hide();
                return false;
        });


	$("a.inviteguest").click(function () {
	        $("a.inviteguest").hide();
	        $("a.nevermind").show();
	        $("label.new").show();
	        $("input#new").show();
	        $("td[colspan=4].newcontact").show();
		$("input.newinvite").show();
	        return false;
	});

        $("a.nevermind").click(function () {
                $("a.inviteguest").show();
                $("a.nevermind").hide();
                $("label.new").hide();
                $("input#new").hide();
                $("td[colspan=4].newcontact").hide();
                $("input.hide").show();

                return false;
        });
        $("a.update").click(function () {
	        $("a.update[id=" + (this.id) + "]").hide();
	        $("a.hide[id=" + (this.id) + "]").show();
	        $("label[id=" + (this.id) + "]").hide();
	        $("input[id=" + (this.id) + "]").show();
	        $("td[colspan=4]." + (this.id)).show();
	       	$("td[id=" + (this.id) + "]").hide();
	        return false;
	});


})


</script>



<div id="success">Success!</div>
<div id="validation">Please enter values.</div>

<script>
$( "#success" ).hide();
$( "#validation" ).hide();
$( "#failure" ).hide();
</script>

<div id="popup" class="modal-box">  
  <header>
    <a href="#" class="js-modal-close close">×</a>
    <h3>Confirm Delete</h3>
  </header>
  <div class="modal-body">
    <p>Are you sure you want to delete this family?</p>
  </div>
  <footer>
    <a href="#" class="js-modal-close">No</a>
    <a href="#" class="js-modal-delete">Yes</a>
  </footer>
</div>
<?php
include 'php/auth.php';
$db = new mysqli($server, $user, $password, $db);

$sql = <<<SQL
select invitees.fid, invitees.first_name, invitees.last_name, contact.phone, contact.address from invitees join contact on contact.fid=invitees.fid

SQL;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row = $result->fetch_assoc()){
	$first=$row['first_name'];
	$last=$row['last_name'];  
	$fid=$row['fid'];
	$address=$row['address'];
	$phone=$row['phone'];
	echo "<form>";
	echo "<tr>";
	echo "<td id=" . $fid . "><label id=" . $fid . ">" . $first . "</label></td>";
	echo "<td id=" . $fid . "><label id=" . $fid . ">" . $last . "</label></td>";
        echo "<td id=" . $fid . "><label id=" . $fid . ">" . $phone . "</label></td>";
        echo "<td id=" . $fid . "><label id=" . $fid . ">" . $address . "</label></p></td>";
	echo "<td id=inputfields class=" .$fid . " colspan=4>";
        echo "<label id=firstname>First Name:</label> <input class=first id= " . $fid . " type=text value=" . $first . ">";
	echo "<br/><label id=lastname>Last Name: </label><input class=last id= " . $fid . " type=text value=" . $last . ">";
	echo "<br/><label id=phone>Phone: </label><input class=phone id = " . $fid . " type=text value=" . $phone . ">";
	echo "<br/><label id=address>Address: </label><input class=address id = " . $fid . " type=text value=" . $address . ">";
	echo "<input type=hidden id=fid value=" . $fid . ">";
	echo "<input id= " . $fid . " type=button value=Submit onClick=\"fidid=(this.id)\"></td>";
	echo "<td><a id=" . $fid . " class=update href=#>update</a>";
	echo "<a id=" . $fid . " class=hide href=#>hide</a>";
	echo " <a id=" . $fid . " class=js-open-modal data-modal-id=popup onClick=\"deleteid=(this.id)\" href=#>delete</a></td>";
	echo "</tr>";

}

?>
<tr>
<td class=newcontact colspan=4>
<label class=new>First Name:</label> <input id=new class=first type=text>
<br/><label class=new>Last Name:</label> <input id=new class=last type=text>
<br/><label class=new>Phone:</label> <input id=new class=phone type=text>
<br/><label class=new>Address:</label> <input id=new class=address type=text>
<br/><input class=newinvite type=button value=Invite>
</td><td></td><td></td><td></td><td></td><td>
<label><a class=inviteguest href=#>Invite a Guest</a></label>
<label><a class=nevermind href=#>Nevermind</a></label>
</td>
<tr><th>&nbsp</th><th></th><th></th><th></th><th></th></tr> 
</table> </div> </label> 
<br/>
<a class=printerfriendly href=#>Printer Friendly</a>
</body> </html>
