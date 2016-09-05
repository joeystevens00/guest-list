<!DOCTYPE html>
<html>
<head>
<title>Guest Info</title>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<link href="css/refreshform.css" rel="stylesheet">
<script src="js/guests-submit.js"></script>

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

<div id="family">
<?php 
include 'php/guests-get-family.php'; 
?>

<h3><?php echo $lastname ?> Family</h3>

</div>
<form id="form" name="form">
<label>

<div id="success">Success!</div>
<div id="validation">Please enter a family phone number and address.</div>
<div id="failure">Something went wrong! Please try again later.</div>

<script>
$( "#success" ).hide();
$( "#validation" ).hide();
$( "#failure" ).hide();
</script>


<input id="phone" placeholder="Family Phone Number" type="text">
<input id="address" placeholder="Family Address" type="text">
<div id="fidrefresh"><input type="hidden" id="fid" value=<?php echo $fid ?>></div>
<input id="submit" type="button" value="Submit">
</form>
</div>
</body>
</html>
