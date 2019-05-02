<?php
session_start();

if(isset($_SESSION['attachment']))
{
	$attachment_type=$_SESSION['attachment_type'];
	$attachment_name=$_SESSION['attachment_name'];
	$attachment=$_SESSION['attachment'];

	$a="Content-type: ".$attachment_type;

 header("Content-type: ".$attachment_type);

	$b='Content-Disposition: attachment; filename="'.$attachment_name.'"';
	
	echo $b.'<br>';
// It will be called downloaded.pdf
	header('Content-Disposition: attachment; filename="'.$attachment_name.'"');

	echo $attachment.'<br>';
// The PDF source is in original.pdf
//	readfile($attachment);
readfile("'".$attachment."'");


/*
header('Content-type: image/jpeg');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="saibaba.jpeg"');

// The PDF source is in original.pdf
readfile('student_attachment/rakkera/saibaba.jpeg');

	unset($_SESSION['attachment_type']);
	unset($_SESSION['attachment_name']);
	unset($_SESSION['attachment']);		
*/
}
else
{
	echo 'You are not logged in. <a href="login.php"> Click here</a> to login"';
}
?>


