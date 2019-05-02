<?php
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name']))) 
{
die("You are not logged in.Click <a href='recruiters_login.php'>here to login</a>");
}	
if(isset($_POST['submit']))
{
  $title=$_POST['title'];
  $desc=$_POST['textarea'];
  $id=$_SESSION['company_id'];
  $query="insert into event values('',$id,'$title','$desc',NOW())";
  $result=mysql_query($query) or die(mysql_error());
  header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/company_profile_page.php');
}
?>

<html>
<body bgcolor='FFFFCC'>
<form method='post'>
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
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="media_add.php">Add Files</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="media_delete.php">Delte Files</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<br />
<h3><u>Adding a new event:</u></h3>
<br />
Event Title: <input type="text" name="title" size="50" maxlength="50">
<br><br><br>
Event Description: <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea rows="20" cols="50" name="textarea"></textarea>
<br>
<input type="submit" text="submit" value='submit' name='submit'>

</form>
</body>
</html>
</td>