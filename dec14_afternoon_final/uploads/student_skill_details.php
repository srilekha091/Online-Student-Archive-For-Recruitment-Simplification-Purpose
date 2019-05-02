<?php
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email']))) 
{
die("You are not logged in.Click <a href='students_login.php'>here to login</a>");
}	
else
{
	echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
	echo '<br>';
	if((isset($_SESSION['email']))) 
	{
	echo'<h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
 	if((isset($_SESSION['name'])) && (isset($_SESSION['recruiter_id']))) 
	{
	echo'<h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
    echo'<a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    if((isset($_SESSION['email']))) 
	{
    echo'<a href ="company_selection_page.php">Company Selection Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
    if((isset($_SESSION['name'])) && (isset($_SESSION['recruiter_id']))) 
	{
    echo'<a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
    echo '<a href ="logout.php">Logout</a></h2>';
	echo '<br>';
	echo '</div>';
	echo '<a href="student_contacts_page_details.php" align="left"><h1>search by student details</a>';
	echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	echo '<a href="student_contacts_page.php" align="right">search  by department</h1></a>';
	?>

<html>
<body>
<form method="post"> 
<table border="4" width="1270" height="592">
<tr valign="top">
<td width="300"> 

<?php

    $fullname=$_SESSION['fullname'];
	$name=$_SESSION['name'];
	$profile_pic=$_SESSION['profile_pic'];
	echo '<img src="'.$profile_pic.'" width =200 height=150><br>';?>
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
<br /><br />
<b>Skill:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type='text' name='name' /> 
<br/><br/>
<b>Department:</b> <input type='text' name='dept' /> 
<br/><br/>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type='submit' value='Show' name='submit'/>
<br /><br />
<?php
if(isset($_POST['submit']))
{
echo '<table border=7>';
echo '<tr>';
echo '<td width=100><center><b>First Name</b></center></td>';
echo '<td width=100><center><b>Last Name</b></center></td>';
echo '<td width=100><center><b>Graduation(YYYY-MM-DD)</b></center></td>';
echo '<td width=100><center><b>Department</b></center></td>';
echo '<td width=170><center><b>Email</b></center></td>';
echo '<td width=100><center><b>Contact#</b></center></td>';
echo '<td width=200><center><b>Skillset</b></center></td>';
echo '</tr>';
	$name=$_POST['name'];
	$query="select * from student where skill regexp '^$name|$name$|,$name,'";
    $result = mysql_query($query) or die(mysql_error());
    while($row_num = mysql_fetch_array($result))
	{
	if($row_num['activate']=='active')
	{
     if($row_num['contact']=='0')
       $row_num['contact']='-';
	 if($row_num['graduation']=='' | $row_num['graduation']=='-' | $row_num['graduation']=='NULL')
       $row_num['graduation']='Information N/A';?>
		<tr>
  <td>       <center>       <?php echo $row_num['fname']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['lname']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['graduation']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['major']; ?> </center></td>
  <td>       <center> <a href ="studentprofile.php"><?php echo $row_num['email']; ?> </a> </center></td>  
<?php
   $disp=substr($row_num['email'],0,7);
  $_SESSION['disp']=$disp;
}?>
  <td>       <center>       <?php echo $row_num['contact']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['skill']; ?> </center></td>

    	</tr>
<?php	}


	}?>
	</table>
	<?php
	mysql_close();
}
?>
</td>
<html>
<body bgcolor='FFFFCC'>
</body>
</html>



