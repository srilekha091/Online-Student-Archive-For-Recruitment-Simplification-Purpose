<?php
session_start();
error_reporting(0);
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name']))) 
{
die("You are not logged in.Click <a href='recruiters_login.php'>here to login</a>");
}	
else
{
$recruiter_id=$_SESSION['recruiter_id'];
$rec_email=$_SESSION['rec_email'];
echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
echo '<br>';
 echo' <h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
 echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
 echo'  <a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
 echo '<a href ="logout.php">Logout</a></h2>';
 echo '</div>';
 ?>

<table border="4" width="1270" height="592">
<tr valign="top">
<td width="300"> 
<?php
	$fullname=$_SESSION['fullname'];
    $profile_pic=$_SESSION['profile_pic'];
	echo '<img src="'.$profile_pic.'" width =200 height=150><br>';
	?>
	<br> 
	
<p><a href="userprofile.php"><h3>Home</h3></a></p> 
<br>
<p><a href= "recruiter_inbox.php"> <h3>Message Tool</h3></a></p>
<br>
<p><a href= "company_profile_page.php"> <h3>Company Page</h3></a></p>
<br>
<p><a href= "recruiter_update_profile.php"><h3> Update Profile </h3></a></p>
</td>	

<td> 
 <?php
 echo '<br>';
 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
//echo '<a href="event_add.php">Add Events</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
echo '<a href="media_add.php">Add Files</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ';
echo '<a href="media_delete.php">Delete Files</a>';
if($_SESSION['forums_bit'] <> 1)
	{
$name=$_SESSION['name'];
	}
	else
	{
	 $n=$_SESSION['name'];
     $query="select * from recruiter where orgname='$n'";
	 $result=mysql_query($query) or die(mysql_error());
     $row_num=mysql_fetch_array($result);
     $name=$row_num['username'];
	}
$query="select * from recruiter where username='$name'";
$result=mysql_query($query) or die(mysql_error());
$row_num=mysql_fetch_array($result);
$orgname=$row_num["orgname"];
$company_id=$row_num["recruiter_id"];
$_SESSION['company_id']=$company_id;
$_SESSION['orgname']=$orgname;
$q1="select * from company where company_id='$company_id'";
	$r1=mysql_query($q1);
	$res1=mysql_num_rows($r1);
	if($res1 == 1)
	{
		 $res=mysql_fetch_array($r1);
		 $cmp_title=$res['title'];
		 $cmp_desc=$res['description'];
	}
	else
	{
	$cmp_desc='';
    $cmp_title='';
	}

if(isset($_POST['submit']))
{
    $title=$_POST['title'];
	$textarea=$_POST['textarea'];
	
	if($res1==0)
	{
	$queryy="insert into company values($company_id,'$orgname','$title','$textarea',NOW(),'0')";
	$queryresult = mysql_query($queryy) or die("Insert new user error:" .mysql_error());
      $result="0";	
	  $r1=mysql_query($q1);
	  $res=mysql_fetch_array($r1);
		 $cmp_title=$res['title'];
		 $cmp_desc=$res['description'];

	}
	else
	{

	$query="update company set title='$title',description='$textarea',lastupdate=NOW()
	where company_id=$company_id";
	$queryresult = mysql_query($query) or die("Insert new user error:" .mysql_error());
      $result="0";	
	  $r1=mysql_query($q1);
	  $res=mysql_fetch_array($r1);
		 $cmp_title=$res['title'];
		 $cmp_desc=$res['description'];
	}
}
}
?>

<?php
if(isset($_SESSION['name']))
{
?>
<html>
<body bgcolor='FFFFCC'>
<form method='post'>
<h2><b>Organization's Name :<?php echo $orgname;?></b></h2>
<br />
Title: <input type="text" name="title" size="50" maxlength="50" value="<?php echo $cmp_title;?>" valign='top'/>
<br /><br />
Company's Description: <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea rows="20" cols="50" name="textarea"><?php echo $cmp_desc;?></textarea>
<br>
<input type="submit" text="submit" value='submit' name='submit'>

</form>
</body>
</html>
<?php
}
else
die("Please login to access this page");
?>
</td>