<?php
session_start();
error_reporting(0);
if(!(isset($_SESSION['email']))) 
{
die("You are not logged in.Click <a href='recruiters_login.php'>here to login</a>");
}	
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
?>

<html>
<body bgcolor='FFFFCC'>
<form method="POST" onsubmit="return confirm('Are you sure you want to submit your selection?')">
<div style="background-color:#FF9912;width:1300px;height:100px">
<br>
<h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="company_selection_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="logout.php">Logout</a></h2>
</div>

<table border="4" width="1270" height="592">
<tr valign="top">
<td width="300"> 
<br><br>
<?php
   $profile_pic=$_SESSION['profile_pic'];
   echo '<img src="'.$profile_pic.'" width =200 height=150><br>';?>
   <br>
   <p><a href="studentprofile.php"><h3>Home</h3></a></p> 
      <br>
   <p><a href= "inbox.php"><h3> Message Tool</h3></a></p>
      <br>
   <p><a href= "media_add_student.php"><h3> Add Files</h3> </a></p> 
      <br>
	  <p><a href= "media_delete_student.php"><h3> Delete Files</h3> </a></p> 
<br>
   <p><a href= "student_update_profile.php"><h3> Update Profile</h3> </a></p> 
</td>	
<td>
<table border="7">
	<tr>
		<b><td width=250><center>File Name</center></td></b>
		<b><td width=400><center>File Size</center></td></b>
		<b><td width=150><center>Date Uploaded</center></td></b>
	</tr>

<?php 
	$i=0;
	$email= $_SESSION['email'];
	$query="select * from media_student where email='$email'";
	$res=mysql_query($query) or die(mysql_error());
	while($rows = mysql_fetch_array($res))
	{?>
		<tr>
		<td><input type="checkbox" name="name[]" value="<?php echo $rows['media_id']; ?>"><?php echo $rows['media_title'] ?></td>
		<td><?php echo $rows['media_size']; ?></td> 
		<td><?php echo $rows['uploaddate'];?></td>
		</tr>
<?php
	}	
	$checked=$_POST['name'];
	$j=$i;
?>
</table>
<br><br>
<input type="submit" name="delete" value="delete">
</form>
</html>


<?php
if(!(isset($_SESSION['email']))) 
{
die("You are not logged in.Click <a href='recruiters_login.php'>here to login</a>");
}	

/*$orgname=$_SESSION['orgname'];
$query="select * from company where orgname='$orgname'";
$res=mysql_query($query) or die(mysql_error());
     $rows = mysql_fetch_array($res);
$cmp_title=$rows['title'];
$cmp_desc=$rows['description'];
$cmp_id=$rows['company_id']; */

if(isset($_POST['delete']))
{
	$email=$_SESSION['email'];
	$i=0;
	foreach($checked as $check)
   {
		$k=$check;
		$q="select * from media_student where media_id='$k'";
		$r=mysql_query($q) or die(mysql_error());
		$row=mysql_fetch_array($r);
		
		$query="delete from media_student where (email='$email' AND media_id='$k')";
		$res=mysql_query($query) or die(mysql_error());
		
		$path='/home/f09t10/public_html/Project/Milestone1/uploads/'.$email.'/'.$row['media_title'];
		chmod("$path",0777);
		unlink("$path");
		
		header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
		
	}
	
}
?>

</td>
