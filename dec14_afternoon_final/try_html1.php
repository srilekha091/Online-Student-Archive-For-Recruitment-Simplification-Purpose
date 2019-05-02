<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
  <?php 
session_start();

if(!(isset($_SESSION['name']))) 
{
die("You are not logged in. Click <a href='loginregister.php'>here to login</a>");
}
else
{
?>
<HTML>
 <BODY bgcolor="CCCC99">
  <br /><br /><br />
 <a href ="userprofile.php" target ="showframe">Home</a><br>
  <br /><br /><br />
  <a href ="student_contacts_page.php" target ="showframe">Student Contacts Page</a><br>
    <br /><br /><br />
  <a href ="company_profiles_page.php" target ="showframe">Company Profiles Page</a><br>
    <br /><br /><br />
	  <a href ="logout.php" target ="exit">Logout</a><br>
    <br /><br /><br />
</form>
 </BODY>
</HTML>
<?php
} ?>







