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
if(!(isset($_SESSION['email'])))
{
  die("You are not logged in. Click <a href='login.php'>here to login</a>");
}
?>

<html>
<body>
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
<body bgcolor='FFFFCC'> 
<form method="POST" >

<table border="4" width="1270" height="592">
<tr valign="top">
<td width="150"> 
<br><br>

<p align="center"><img src='clemsonuniv.jpg'></p>
<p align="center"><a href="ComposeMail.php">Compose Mail</a></p>  
<?php
	$email=$_SESSION['email'].'@clemson.edu';
	$q1="select count(*) from messages where sendto='$email' AND bit='no' AND flag='0'";
	$resu1=mysql_query($q1);
	$row2=mysql_fetch_array($resu1);
?>
<p align="center"><a href="inbox.php">Inbox(<?php echo $row2['count(*)']; ?>)</a></p> 
<p align="center"><a href="SentMail.php">Sent Mail</a></p> 
<?php
	$email=$_SESSION['email'].'@clemson.edu';
	$q11="select count(*) from messages where sendto='$email' AND bit='no' AND flag='1'";
	$resu11=mysql_query($q11);
	$row21=mysql_fetch_array($resu11);
?>
<p align="center"><a href="SpamMail.php">Spam Mail(<?php echo $row21['count(*)']; ?>)</a></p> 

</td>

<td>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<?php
if(isset($_POST['showdetails']))
{
	echo '<input type="submit" name="hidedetails" value="hide details"></input>';
}
else
{
	echo '<input type="submit" name="showdetails" value="show details"></input>';
}
?>

<input type="submit" name="Delete" value="Delete"></input>

<?php
if(isset($_POST['Delete']))
{
  $queryString = $_SERVER['QUERY_STRING'];
  $query1 = "DELETE FROM messages where message_id='$queryString'";
  $result = mysql_query($query1) or die(mysql_error());
  header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/inbox.php');
}
$queryString = $_SERVER['QUERY_STRING'];
$query = "SELECT * FROM messages where message_id='$queryString'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

$mid=$row['sendto'];

$q="select * from registered_users where email='$mid'";
$res=mysql_query($q) or die(mysql_error());
$row1 = mysql_fetch_array($res);

$mid1=$_SESSION['email'].'@clemson.edu';

$q1="select * from registered_users where email='$mid1'";
$res1=mysql_query($q1) or die(mysql_error());
$row2 = mysql_fetch_array($res1);

if(isset($_POST['showdetails']))
{
	echo '<br>';
	echo '<b>FROM :</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  '.$row2['fname'].' '.$row2['lname']."<b><</b>".$row['sendfrom']."<b>></b><br>";
	echo '<b>TO :</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp '.$row1['fname'].' '.$row1['lname']."<b><</b>".$row['sendto']."<b>></b><br>";
	echo '<b>DATE :</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   '.$row['t_timestamp'].'<br>';
	echo '<b>SUBJECT :</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   '.$row['subject'].'<br>';
	echo '<b>MAILED-BY:</b>&nbsp&nbsp&nbsp&nbsp '.'pba.cs.clemson.edu'.'<br><br><br>';
}
else
{
echo '<br>';
echo '<b>'.$row2['fname'].$row2['lname'].'</b>'.' to '.$row1['fname'].$row1['lname'].'<br><br><br>';
}
echo '<hr />';
echo '<h2><u>Subject :'.$row['subject'].'</u></h2>';
echo '<hr />';
?>
<?php if($row['attachment'] != ''){ ?><a href="<?php echo $row['attachment']; ?>" onchange="javascript:saveDownload()"> Download attachment </a><?php } ?>
<?php
echo '<h2><b>Body:</b></h2>';
echo  $row['body'];

if($row['attachment'] != '')
{
}
?>
</td>
</tr>
</table>
</form>
</body>
</html>
