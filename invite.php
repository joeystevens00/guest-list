<!DOCTYPE html>
<html>
<head>
<title>New Invitee</title>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<link href="css/refreshform.css" rel="stylesheet">
<script src="js/invite-submit.js"></script>

</head>
<body>
<header>
  <button class="hamburger">&#9776;</button>
  <button class="cross">&#735;</button>
</header>

<div class="menu">
  <ul>
    <a href="guests.php"><li>Family Contact Info</li></a>
    <a href="invite.php"><li>New Invitee</li></a>
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

<form id="form" name="form">
<h3>Invite a Guest</h3>
<label>
<div id="success">Success! Maybe try updating <a href="guests.php">family contact</a> info now</div>
<div id="validation">Please enter a first and last name.</div>
<div id="failure">Something went wrong! Please try again later.</div>

<script>
$( "#success" ).hide();
$( "#validation" ).hide();
$( "#failure" ).hide();
</script>
<input id="first" placeholder="First Name" type="text">
<input id="last" placeholder="Last Name" type="text">
<input id="submit" type="button" value="Submit">

</form>
</div>
</body>
</html>
