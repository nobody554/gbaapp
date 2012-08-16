<html manifest="gbaapp.appcache">
<head>

 <meta name="viewport" content="user-scalable=no, width=device-width, maximum-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="no" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />	
    <link rel="apple-touch-icon" href="images/homeicon.jpg"/>
    <link rel="apple-touch-startup-image" href="images/loader.png" />
	<link rel="stylesheet" type="text/css" href="style.css" />
    
    <title>ABD Guide</title>
	
<!-- Prevent Scrolling -->
<script type="text/javascript">
document.ontouchmove = function(e){ e.preventDefault(); }
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2798917-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<BODY marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" bgcolor="black">

<?php

if(isset($_POST['email'])) {

	$email_to = "chris@thechrisbrewer.com";
	$email_subject = "GBA App: Contact Form Submitted";
	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	
	$email_message = "New contact form submission below. \n\n";
	
	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:","href");
		return str_replace($bad,"",$string);
	}
	
	$email_message .= "Name: ".clean_string($first_name)." ".clean_string($last_name)."\n";
	$email_message .= "Email: ".clean_string($email)."\n";
	$email_message .= "Message: ".clean_string($comment)."\n";
	
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n".
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

$submit_message = "Thank you for contacting us. We will be in touch with you very soon!\n\n";
}

print "<br><center><h1>Contact Us</h1></center><br>
	<div id=\"contact-area\"><font color=\"white\">
		<form method=\"post\">$submit_message
			<p><label for=\"first_name\">First Name:</label>&nbsp;
			<input type=\"text\" id=\"first_name\" name=\"first_name\" /></p><br />
			
			<p><label for=\"last_name\">Last Name:</label>&nbsp;
			<input type=\"text\" id=\"last_name\" name=\"last_name\" /></p><br />
			
			<p><label for=\"email\">Email:</label>&nbsp;
			<input type=\"text\" id=\"email\" name=\"email\" autocapitalize=\"none\" placeholder=\"example@domain.com\" /></p><br />
			
			<p><label for=\"comment\">Comment:</label>&nbsp;
			<textarea type=\"text\" id=\"comment\" name=\"comment\" autocapitalize=\"sentences\" rows=5 cols=25></textarea></p><br />
			
			<br><input type=\"submit\" name=\"submit\" value=\"Submit\" class=\"button\" />&nbsp;&nbsp;<input class=\"button\" type=\"button\" value=\"Back\" onClick=\"location.href='ioshome.html'\">
			</form></font>
			
			<div style=\"clear: both;\"></div>
		</div>"
?>
		
</body>
</html>
