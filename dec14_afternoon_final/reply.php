<?php
session_start();
error_reporting(0);
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['admin']))) 
{
die("You are not logged in. Click <a href='login.php'>here to login</a>");
}	

if(!isset($_SESSION['cuid']) && !isset($_SESSION['admin']))
 {
	echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    echo '<br>';
    echo' <h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo'  <a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo '<a href ="logout.php">Logout</a></h2>';
	echo '</div>';
    echo '<br>';

  $recid=$_SESSION['recruiter_id'];
  $emaila=$_SESSION['rec_email'];
  $query="select * from recruiter where email='$emaila'";
  $res=mysql_query($query) or die(mysql_error());
  $rows = mysql_fetch_array($res);
  $name=$rows['orgname'];
  $_SESSION['name']=$name;
 }

 if(isset($_SESSION['cuid']))
 {
	 echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    	echo '<br>';
	    echo' <h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
       echo'  <a href ="company_selection_page.php">Company Selection      Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo '<a href ="logout.php">Logout</a></h2>';
		echo '</div>';
  $cuid=$_SESSION['cuid'];
  $emaila=$_SESSION['email'];
  $email=$emaila.'@clemson.edu';
  
  $query="select * from student where email='$email'";
  $res=mysql_query($query) or die(mysql_error());
  $rows = mysql_fetch_array($res);
  $name=$rows['fname'];
  $_SESSION['name']=$name;
 }

 if(isset($_SESSION['admin']))
 {
	 echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
   	 echo '<br>';
	 echo' <h2><a href ="student_contacts_page.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
     echo'  <a href ="userprofile.php">Recruiter Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	 echo'  <a href ="company_profile_page.php">Company Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
     echo '<a href ="logout.php">Logout</a></h2>';
	 echo '</div>';
	 echo '<br>';
 }

 ?>
 <body bgcolor='FFFFCC'>
<?php 
 $querystring=$_SERVER['QUERY_STRING'];

list($id,$delete)=split("=",$querystring);

//echo $id;
$company_id=$_SESSION['company_id'];

if(!isset($_SESSION['cuid']))
 {
  echo " In recruiter";
  $recid=$_SESSION['recruiter_id'];
  $emaila=$_SESSION['rec_email'];
  $emaila=$emaila.'@clemson.edu';
  $query="select * from recruiter where recruiter_id='$recid'";
  $res=mysql_query($query) or die(mysql_error());
  $rows = mysql_fetch_array($res);
  $name=$rows['orgname'];
  }

 else
 {
  echo " In Student";
  $cuid=$_SESSION['cuid'];
  $emaila=$_SESSION['email'];
  $email=$emaila.'@clemson.edu'; 
  $query="select * from student where email='$email'";
  $res=mysql_query($query) or die(mysql_error()); 
  $rows = mysql_fetch_array($res);
  $name=$rows['fname'];
 }

 $_SESSION['name']=$name;

$q1="select * from forums where forum_id='$id'";
$r1=mysql_query($q1);
$a=mysql_fetch_array($r1);
$company_id=$a['company_id'];
$reply_id=$a['forum_id'];
$forum_topic=$a['forum_topic'];
$level=$a['level']+1;

if(isset($_POST['post_comm']))
{
	$message=$_REQUEST['comments'];
	$q2="insert into forums values($company_id,'$message',NOW(),'$name','','$forum_topic',$reply_id,$level)";
	$r2=mysql_query($q2);
	$dest="Location: discussion.php?did=".$a[5];
	header($dest);
}


?>
 
 Add your comment to the discussion on this thread:
														
						<form method=post enctype=multipart/form-data >												
						<td><textarea name=comments cols=50 rows=5></textarea></td>						 
						<td><input type=submit name=post_comm value=Post comment></td>
						</form>