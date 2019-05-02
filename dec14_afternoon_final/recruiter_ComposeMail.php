<?php
error_reporting(0);
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])))
{
  die("You are not logged in. Click <a href='recruiters_login.php'>here to login</a>");
}
?>

<html>
<body bgcolor='FFFFCC'>
<?php
echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    	echo '<br>';
	    echo' <h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
   
       echo'  <a href ="company_profiles_page.php">Company Home      Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

        echo '<a href ="logout.php">Logout</a></h2>';
		echo '</div>';
		echo '<br>';
		?>
<form method="POST" action="attachment_student.php" enctype="multipart/form-data">
<table border="4" width="1270" height="592">
<tr valign="top">
<td width="150"> 
<br><br>

<p align="center"><img src='clemsonuniv.jpg'></p>
<p align="center"><a href="recruiter_ComposeMail.php">Compose Mail</a></p>  
<?php
	$username= $_SESSION['name'];
	$q="select * from recruiter where username='$username'";
	$resu=mysql_query($q);
	$row1=mysql_fetch_array($resu);
	$email=$row1['email'];
	$q1="select count(*) from messages where sendto='$email' AND bit='no' AND flag='0'";
	$resu1=mysql_query($q1);
	$row2=mysql_fetch_array($resu1);
?>
<p align="center"><a href="recruiter_inbox.php">Inbox(<?php echo $row2['count(*)']; ?>)</a></p> 
<p align="center"><a href="recruiter_SentMail.php">Sent Mail</a></p>
<?php
	$username= $_SESSION['name'];
	$q="select * from recruiter where username='$username'";
	$resu=mysql_query($q);
	$row1=mysql_fetch_array($resu);
	$email=$row1['email'];
	$q2="select count(*) from messages where sendto='$email' AND bit='no' AND flag='1'";
	$result=mysql_query($q2);
	$row3=mysql_fetch_array($result);
?>
<p align="center"><a href="recruiter_SpamMail.php">Spam Mail(<?php echo $row3['count(*)']; ?>)</a></p>
</td>
<td>
<?php
	if(isset($_SESSION['rec_sendfrom']))
	{
		?>
     <br /><br />
     <b>To : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b><input type='text' size='7' maxlength='7' name='to' value='<?php echo $_SESSION['rec_sendfrom']; ?>'>@clemson.edu</input>     
	 <br /><br />
	<?php
    unset($_SESSION['rec_sendfrom']);
	}
	else
	{
	?>
<b>To : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b><input type='text' size='7' maxlength='7' name='to'>@clemson.edu</input>
<br /><br />
<?php 
	}
	?>


<?php
	if(isset($_SESSION['rec_subject']))
	{
	 ?>
     <br /><br />
     <b>Subject : </b><input type='text' value='<?php echo 'Re: '.$_SESSION['rec_subject']; ?>' size='150' name='subject'/>
	 <br /><br />
	<?php
    unset($_SESSION['rec_subject']);
	}
	else
	{
	?>
    <b>Subject : </b><input type='text'  name='subject' size='150'/>
    <br /><br />
    <?php 
	}
	?>
<br /><br /><br /><br />
<label for="file"><b>Filename:</b></label>
<input type="file" name="file" id="file" /> 
<br /><br />
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

<?php
 /* if(isset($_POST['sendmail']))
{
 $name=$_SESSION['name'];
 $query7= "select * from recruiter where username='$name'";
 $result7=mysql_query($query7);
 $row=mysql_fetch_array($result7);
 $email=$row['email'];
 $sendfrom=$email;
 $sendto=$_POST['to'].'@clemson.edu';
 $sub=$_POST['subject'];
 $body=$_POST['body'];
 echo  'email is '.$email;
 echo 'from '.$sendfrom;
 echo 'to '.$sendto;
 echo 'subject is '.$sub;
 echo 'body '.$body;
 $query= "insert into messages values('$sendfrom','$sendto','$body',NOW(),'','','$sub','no','')";
 $result=mysql_query($query);
header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/recruiter_inbox.php');
} */
?>
