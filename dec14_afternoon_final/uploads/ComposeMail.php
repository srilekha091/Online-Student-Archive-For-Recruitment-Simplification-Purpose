<?php
error_reporting(0);
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['email'])))
{
  die("You are not logged in. Click <a href='login.php'>here to login</a>");
}
?>

<html>
<body bgcolor='FFFFCC'>
<?php
echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    	echo '<br>';
	    echo' <h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
   
       echo'  <a href ="company_selection_page.php">Company Selection      Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

        echo '<a href ="logout.php">Logout</a></h2>';
		echo '</div>';
		echo '<br>';
		?>
<form method="POST" action="attachment_student.php" enctype="multipart/form-data" >
<table border="4" width="1270" height="592">
<tr valign="top">
<td width="300"> 
<?php
    $fname=$_SESSION['fname'];
	?>
<td>
<table border="4" width="1270" height="592">
<tr valign="top">
<td width="150"> 
<br><br>

<p align="center"><img src='clemsonuniv.jpg'></p>

<p align="center"><a href="ComposeMail.php">Compose Mail</a></p>  <!--             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->
<?php
	$email=$_SESSION['email'].'@clemson.edu';
	$q1="select count(*) from messages where sendto='$email' AND bit='no'";
	$resu1=mysql_query($q1);
	$row2=mysql_fetch_array($resu1);
?>
<p align="center"><a href="inbox.php">Inbox(<?php echo $row2['count(*)']; ?>)</a></p> <!-- &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-->
<p align="center"><a href="SentMail.php">Sent Mail</a></p>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<p align="center"><a href="SpamMail.php">Spam Mail</a></p>
</td>
<td>
<br /><br />
<b>To : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b><input type='text' size='7' maxlength='7' name='to'>@clemson.edu</input>
<br /><br />
<b>Subject : </b><input type='text' size='150' name='subject'/>
<br /><br /><br /><br />
<label for="file"><b>Filename:</b></label>
<input type="file" name="file" id="file" /> 

<br>
<b>Body : </b>
<br>
<textarea rows="15" cols="125" name="body">
</textarea>
<br /><br />
<input type="submit" value="Send" name="sendmail" />
</td>
</tr>
</table>
</form>
</td>