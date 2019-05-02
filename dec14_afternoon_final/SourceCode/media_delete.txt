<?php
session_start();
error_reporting(0);
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');

if(!(isset($_SESSION['name']))) 
{
die("You are not logged in.Click <a href='recruiters_login.php'>here to login</a>");
}	

$orgname=$_SESSION['orgname'];
$name=$_SESSION['name'];
$query="select * from company where orgname='$orgname'";
$res=mysql_query($query) or die(mysql_error());
$rows = mysql_fetch_array($res);
$cmp_title=$rows['title'];
$cmp_desc=$rows['description'];
$cmp_id=$rows['company_id'];
?>

<html>
<body bgcolor='FFFFCC'>
<form method="POST" onsubmit="return confirm('Are you sure you want to submit your selection?')">
<div style="background-color:#FF9912;width:1300px;height:100px">
<br>
<h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="logout.php">Logout</a></h2>
</div>

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
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="media_add.php">Add Files</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<br />
<h3><u>Deleting Files:</u></h3>
<br />
<table border="7">
	<tr>
		<td width=400><center><b>File Name</b></center></td>
		<td width=250><center><b>File Size(KB)</b></center></td>
		<td width=250><center><b>Date Uploaded</b></center></td>
	</tr>

<?php 
	$query="select * from media where company_id='$cmp_id'";
	$res=mysql_query($query) or die(mysql_error());
	while($rows = mysql_fetch_array($res))
	{?>
		<tr>
		<td><input type="checkbox" name="name[]" value="<?php echo $rows['media_id']; ?>"><?php echo $rows['media_title'] ?></td>
		<td><center><?php echo $rows['media_size']/1000; ?></center></td> 
		<td><center><?php echo $rows['uploaddate'];?></center></td>
		</tr>
<?php
	}
   $checked=$_POST['name'];
?>
</table>
<br><br>
<input type="submit" name="delete" value="delete">
</form>
</html>

<?php
if(isset($_POST['delete']))
{
foreach($checked as $check)
{
  $k=$check;
  $q="select * from media where media_id='$k'";
  $r=mysql_query($q) or die(mysql_error());
  $row=mysql_fetch_array($r);

  $query="delete from media where (company_id='$cmp_id' AND media_id='$k')";
  $res=mysql_query($query) or die(mysql_error());
  $path='/home/f09t10/public_html/Project/Milestone1/uploads/'.$name.'/'.$row['media_title'];
  chmod("$path",0777);
  unlink("$path");		
header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/company_profile_page.php');
}
}?>




