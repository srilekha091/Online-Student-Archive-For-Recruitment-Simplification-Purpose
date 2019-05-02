<?php
session_start();
if(!(isset($_SESSION['email']))) 
{
die("You are not logged in.Click <a href='recruiters_login.php'>here to login</a>");
}	
?>

<html>
<body bgcolor='FFFFCC'>
<form action="media_add_student_nav.php" method="post" enctype="multipart/form-data">
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
<center><h1><?php echo $_SESSION['fname'].'\'s.'.' Profile Page'; ?></h1></center>
<br />
<h3><u>Adding files:</u></h3>
<br />
<label for="file"><b>Filename:</b></label>
<input type="file" name="file" id="file" /> 
<br /><br /><br />
<input type="submit" name="submit" value="Add" />
</td>
</form>
</body>
</html>

