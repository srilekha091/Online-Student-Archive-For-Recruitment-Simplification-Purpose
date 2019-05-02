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
<form method="POST" onsubmit="return confirm('Are you sure you want to submit your selection?')">
<table border="4" width="1270" height="592">
<tr valign="top">
<td width="300"> 
<?php
    $fname=$_SESSION['fname'];
	$querystring=$_SERVER['QUERY_STRING'];
?>
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
	$q2="select count(*) from messages where sendto='$email' AND bit='no' AND flag='1'";
	$resul1=mysql_query($q2);
	$row3=mysql_fetch_array($resul1);
?>
<p align="center"><a href="SpamMail.php">Spam Mail(<?php echo $row3['count(*)']; ?>)</a></p>
</td>
<td>
<input type="text" maxlength="30" size="30" name="keyword" />
<input type="submit" value="Search Mail" name="search" />
<br><br><br>
<input type="submit" name="Delete" value="Delete"></input><br><br>
<?php
if(isset($_POST['search']))
{	
 echo $_POST['keyword']; $srch="Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/SpamMail.php?".$_POST['keyword'];
 header($srch);
}
echo '<table border="1">';
echo '<b>From</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>Subject</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp <b>Date</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Time </b>';
$sendto=$_SESSION['email'].'@clemson.edu';
if($querystring == '')
{
$query= "select * from messages where sendto='$sendto' AND flag='1'";
$result=mysql_query($query);
while($rows=mysql_fetch_array($result))
{	
	$sendfrom =$rows['sendfrom'];
	$query1= "select * from registered_users where email='$sendfrom'";
	$res=mysql_query($query1);
	$row_num=mysql_fetch_array($res);
	?>	
    <tr ><td width="350"><?php 	if($rows['bit'] == 'no')
	  echo '<b>'; ?><input type="checkbox" name="name[]" value="<?php echo $rows['message_id']; ?>">	<?php echo $row_num['fname']." ".$row_num['lname']; if($rows['bit'] == 'no')
	  echo '</b>';	?></td><td width="350"><a href='spam_message.php?<?php echo $rows['message_id']?>'><?php echo $rows['subject']?></a><?php if($rows['attachment'] != ''){ echo '<img src="attachment2.png" align="right" width="20" height="20">'; } ?></td><td width="380"><?php echo $rows['t_timestamp'];?> </input></td></tr> 
<?php 
	if($rows['bit'] == 'yes')
	  echo '</b>';	
	}
}

else
{	
$check = 0;
$q="select distinct email from registered_users where (fname='$querystring' OR lname='$querystring') OR (fname regexp '^$querystring |$querystring$' AND lname='')";
$r=mysql_query($q);
while($r1=mysql_fetch_array($r))
{
 $check = 1;
 $from=$r1['email'];
 if($from <> '')
 {	
 $query="select * from messages where sendto='$sendto' AND (MATCH(subject,body) AGAINST ('$querystring' in boolean mode) OR sendfrom='$from')  AND flag='1'";
 $result=mysql_query($query);
 }
while($rows=mysql_fetch_array($result))
{	
	$sendfrom =$rows['sendfrom'];
	$query1= "select * from registered_users where email='$sendfrom'";
	$res=mysql_query($query1);
	$row_num=mysql_fetch_array($res);
	?>
	
    <tr ><td width="350"><?php 	if($rows['bit'] == 'no')
	  echo '<b>'; ?><input type="checkbox" name="name[]" value="<?php echo $rows['message_id']; ?>">	<?php echo $row_num['fname']." ".$row_num['lname']; if($rows['bit'] == 'no')
	  echo '</b>';	?></td><td width="350"><a href='spam_message.php?<?php echo $rows['message_id']?>'><?php echo $rows['subject']?></a><?php if($rows['attachment'] != ''){ echo '<img src="attachment2.png" align="right" width="20" height="20">'; } ?></td><td width="380"><?php echo $rows['t_timestamp'];?> </input></td></tr> 

<?php 
	if($rows['bit'] == 'yes')
	  echo '</b>';	
}
	}

if($check == 0)
{
  $query="select * from messages where sendto='$sendto' AND (subject regexp '^$querystring | $querystring | $querystring$| $querystring$|^$querystring$|^$querystring$|$querystring,' OR body regexp '^$querystring | $querystring | $querystring$| $querystring$|^$querystring$|^$querystring$|$querystring,')  AND flag='1'";
  $result=mysql_query($query);
while($rows=mysql_fetch_array($result))
{	
	$sendfrom =$rows['sendfrom'];
	$query1= "select * from registered_users where email='$sendfrom'";
	$res=mysql_query($query1);
	$row_num=mysql_fetch_array($res);
	?>
	
    <tr ><td width="350"><?php 	if($rows['bit'] == 'no')
	  echo '<b>'; ?><input type="checkbox" name="name[]" value="<?php echo $rows['message_id']; ?>">	<?php echo $row_num['fname']." ".$row_num['lname']; if($rows['bit'] == 'no')
	  echo '</b>';	?></td><td width="350"><a href='inbox_message.php?<?php echo $rows['message_id']?>'><?php echo $rows['subject']?></a><?php if($rows['attachment'] != ''){ echo '<img src="attachment2.png" align="right" width="20" height="20">'; } ?></td><td width="380"><?php echo $rows['t_timestamp'];?> </input></td></tr> 

<?php 
	if($rows['bit'] == 'yes')
	  echo '</b>';	
}
	}

}
$checked=$_POST['name'];
echo '</table>';
?> 
</td>
</tr>
</table>
</form>
</body>
</html>

<?php 
if(isset($_POST['Delete']))
{
 foreach($checked as $check)
   {
        $k=$check;
		echo $k;
		$query2= "delete from messages where message_id='$k'";
		$res1= mysql_query($query2) or die(mysql_error());
    }
	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/inbox.php');
}
?>
</td>