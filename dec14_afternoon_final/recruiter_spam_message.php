<script type ="text/javascript">
function saveDownload()
{
	$.post(,,function(message){});
}

</script>
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
<body>
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

<body bgcolor='FFFFCC'> 
<form method="POST" >
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
	$q1="select * from recruiter where username='$username'";
	$resu1=mysql_query($q1);
	$row1=mysql_fetch_array($resu1);
	$email=$row1['email'];
	$q2="select count(*) from messages where sendto='$email' AND bit='no' AND flag='1'";
	$resu2=mysql_query($q2);
	$row3=mysql_fetch_array($resu2);
?>
<p align="center"><a href="recruiter_SpamMail.php">Spam Mail(<?php echo $row3['count(*)']; ?>)</a></p> 
</td>

<td>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<?php
if(isset($_POST['showdetails']))
{
	echo '<input type="submit" name="hidedetails" value="hide details"></input>';
}
else
{
	echo '<input type="submit" name="showdetails" value="show details"></input>';
}
$queryString = $_SERVER['QUERY_STRING'];
 $query = "SELECT * FROM messages where message_id='$queryString'";
 $result = mysql_query($query) or die(mysql_error());
 $row = mysql_fetch_array($result); 
 $sendfrom=$row['sendfrom'];
 $que="select * from messages where (sendto='$email' AND sendfrom='$sendfrom')";
 $res = mysql_query($que);
 $ro = mysql_fetch_array($res);
 
 if($ro['flag'] == 1)
 {
   echo '<input type="submit" name="unblocksender" value="unblock sender"></input>';
 }
 else
 echo '<input type="submit" name="blocksender" value="block sender"></input>';

?>
<input type="submit" name="Delete" value="Delete"></input>

<?php
if(isset($_POST['hidedetails']))
{
	$dest='http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/recruiter_inbox_message.php?'.$queryString;
}

if(isset($_POST['unblocksender']))
 {
   $qu="update messages set flag='0' where (sendto='$email' AND sendfrom='$sendfrom')";
   $re=mysql_query($qu);
   $r=mysql_fetch_array($re);
   header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/recruiter_inbox.php');
 }
if(isset($_POST['blocksender']))
{
 $qu="update messages set flag='1' where (sendto='$email' AND sendfrom='$sendfrom')";
 $re=mysql_query($qu);
 $r=mysql_fetch_array($re);
 header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/recruiter_SpamMail.php');
}



/*
if(isset($_POST['blocksender']))
{
 $queryString = $_SERVER['QUERY_STRING'];
 $query = "SELECT * FROM messages where message_id='$queryString'";
 $result = mysql_query($query) or die(mysql_error());
 $row = mysql_fetch_array($result); 
 $sendfrom=$row['sendfrom'];
 $que="select * from messages where (sendto='$email' AND sendfrom='$sendfrom')";
 $res = mysql_query($que);
 while($row7 = mysql_fetch_array($res))
	{   	
     $qu="update messages set flag='1' where (sendto='$email' AND sendfrom='$sendfrom')";
     $re= mysql_query($qu);
	}
	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/recruiter_SpamMail.php');
}
if(isset($_POST['unblocksender']))
{
 $queryString = $_SERVER['QUERY_STRING'];
 $query = "SELECT * FROM messages where message_id='$queryString'";
 $result = mysql_query($query) or die(mysql_error());
 $row = mysql_fetch_array($result);
 $sendfrom=$row['sendfrom'];
 $que="select * from messages where sendto='$email' AND sendfrom='$sendfrom'";
 $res = mysql_query($que);
 while($row7 = mysql_fetch_array($res))
	{   
     $qu="update messages set flag='0' where (sendto='$email' AND sendfrom='$sendfrom')";
     $re= mysql_query($qu);
	}
	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/recruiter_inbox.php');

// $row7 = mysql_fetch_array($res);
// $row7['10']=0;
}

*/

if(isset($_POST['Delete']))
{
  $queryString = $_SERVER['QUERY_STRING'];
  $query1 = "DELETE FROM messages where message_id='$queryString'";
  $result = mysql_query($query1) or die(mysql_error());
  header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/recruiter_inbox.php');
}
$queryString = $_SERVER['QUERY_STRING'];
$query = "SELECT * FROM messages where message_id='$queryString'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

$mid=$row['sendfrom'];

$q="select * from registered_users where email='$mid'";
$res=mysql_query($q) or die(mysql_error());
$row1 = mysql_fetch_array($res);

$name=$_SESSION['name'];
$q2="select * from recruiter where username='$name'";
$res2=mysql_query($q2) or die(mysql_error());
$row3 = mysql_fetch_array($res2);

$mid1=$row3['email'];

$q1="select * from registered_users where email='$mid1'";
$res1=mysql_query($q1) or die(mysql_error());
$row2 = mysql_fetch_array($res1);

$query2="update messages set bit='yes' where message_id='$queryString'";
$res= mysql_query($query2) or die(mysql_error());

if(isset($_POST['showdetails']))
{
	$_SESSION['rec_sendfrom']=$row['sendfrom'];   
	$_SESSION['rec_subject']=$row['subject'];   
	echo '<br>';
	echo '<b>FROM :</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp '.$row1['fname'].' '.$row1['lname']."<b><</b>".$row['sendfrom']."<b>></b><br>";
	echo '<b>REPLY-TO :</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href ="recruiter_ComposeMail.php">'.$row1['fname'].' '.$row1['lname']."<b><</b>".$row['sendfrom']."<b>></b><br>";?> </a>
	<?php
	echo '<b>TO :</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp '.$row2['fname'].' '.$row2['lname']."<b><</b>".$row['sendto']."<b>></b><br>";
	echo '<b>DATE :</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp '.$row['t_timestamp'].'<br>';
	echo '<b>SUBJECT :</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp '.$row['subject'].'<br>';
	echo '<b>MAILED-BY:</b>&nbsp&nbsp&nbsp&nbsp '.'pba.cs.clemson.edu'.'<br><br><br>';
}
else
{
echo '<b>'.$row1['fname'].$row1['lname'].'</b>'.' to me<br><br><br>';
}
echo '<hr />';
echo '<h2><b><u>Subject:</u></b>'.$row['subject'].'</h2>';
echo '<hr />';
?>
	<?php if($row['attachment'] != ''){ ?><a href="<?php echo $row['attachment']; ?>" onchange="javascript:saveDownload()"> Download attachment </a><?php } ?>
<?php
echo '<h2><u><b>Body:</b></u></h2>';
echo  $row['body'];
?>
</td>
</tr>
</table>
</form>
</body>
</html>
