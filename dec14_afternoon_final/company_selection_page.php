<?php
error_reporting(0);
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['email']))) 
{
die("You are not logged in.Click <a href='students_login.php'>here to login</a>");
}	
else
{
    $cuid=$_SESSION['cuid'];
	echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
	echo '<br>';
	echo' <h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo'  <a href ="company_selection_page.php">Company Selection Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo '<a href ="logout.php">Logout</a></h2>';
	echo '</div>';
	echo '<br>';
if(isset($_POST['submit']))
{
		$_SESSION['orgname']=$_POST['major'];
    	 header('Location: company_profile_page.php');
}
}
?>
<body bgcolor='FFFFCC'>
<form method='post'>
<table border="4" width="1270" height="592">
<tr valign="top">
<td width="300"> 
<?php
    $fname=	$_SESSION['fname'];
    $profile_pic=$_SESSION['profile_pic'];
	echo '<img src="'.$profile_pic.'" width =200 height=150><br>';?>

<p><a href="studentprofile.php"><h3>Home</h3></a></p> 
<br>
<p><a href= "inbox.php"><h3> Message Tool</h3></a></p>
<br>
<p><a href= "media_add_student.php"><h3> Add Files</h3> </a></p> 
<br>
<p><a href= "media_delete_student.php"><h3> Delete Files</h3> </a></p> 
<br>
<p><a href= "student_update_profile.php"> <h3>Update Profile</h3> </a></p>
</td>	
<td>
<u><center><h1><?php echo $fname.'\'s.'.' Profile Page'; ?></h1></center></u>
<?php
$query="select * from company where ban=0";
$res=mysql_query($query);
echo '<h2><b><u>Select a company:</u></b></h2>';
echo '<select name="major">';
while($r = mysql_fetch_array($res))
{
	?>

<option value="<?php echo $r['orgname']; ?>"><?php echo $r['orgname']; ?></option>
<?php } ?>
</select>
<br><br><br>
<input type="submit" text="submit" value='select' name='submit'>
</td>
</form>
</body>

