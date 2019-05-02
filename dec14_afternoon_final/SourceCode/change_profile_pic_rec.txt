<?php
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');

if(!(isset($_SESSION['name']))) 
{
	die("You are not logged in. Click <a href='login.php'>here to login</a>");
}
else
{
echo '<form action="profile_pic_rec.php" method="post" enctype="multipart/form-data">';
	echo' <h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
 echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
 echo'  <a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
 echo '<a href ="logout.php">Logout</a></h2>';
 echo '<br>';		



echo '<center><h1>Welcome '.$_SESSION['name'].'</h1></center>';
echo '<br />';
echo '<h3><u>Change Profile Pic:</u></h3>';
echo '<br />';
echo '<form>';
echo '<label for="file"><b>Filename:</b></label>';
echo '<input type="file" name="file" id="file" /> ';
echo '<br /><br /><br />';
echo '<input type="submit" name="submit" value="Submit" />';
echo '</form>';
}
?>