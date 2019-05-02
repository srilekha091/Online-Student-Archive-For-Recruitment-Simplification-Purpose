<?php
error_reporting(0);
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['admin']))) 
{
die("You are not logged in.Click <a href='login.php'>here to login</a>");
}	
else
{
	echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
	echo '<br>';
	if(isset($_SESSION['admin']))
	{
		echo'<h2><a href ="student_contacts_page.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		echo'<a href ="banned.php">Banned users</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

	}
	if((isset($_SESSION['email']))) 
	{
	echo'<h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
 	if((isset($_SESSION['name'])) && (isset($_SESSION['recruiter_id']))) 
	{
	echo'<h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
	if(!isset($_SESSION['admin']))
	{
    echo'<a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
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
	echo '<a href="student_contacts_page.php" align="left"><h1>search by department</a>';
	if(isset($_SESSION['admin']))
	{
echo	'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	echo '<a href="search_recruiters.php">recruiter search</a>';
	}
	echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	if((isset($_SESSION['name'])) && (isset($_SESSION['recruiter_id']))) 
	echo '<a href="student_skill_details.php" align="right">search for students by skill</h1></a>';
	?>
	
<html>
<body>
<form method='post'>
<table border="4" width="1270" height="592">
<tr valign="top">
<?php 
	if(!isset($_SESSION['admin']))
	{ ?>
<td width="300"> 
<?php
}
if((isset($_SESSION['cuid']))) 
{
   $fname=$_SESSION['fname']; 
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
<p><a href= "student_update_profile.php"><h3> Update Profile</h3> </a></p>

<?php	} 
  
if((isset($_SESSION['name'])) && (isset($_SESSION['recruiter_id']))) 
{
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

<?php
} 
?>

<?php 
	if(!isset($_SESSION['admin']))
	{ ?>
</td>	
<?php 
	} 
?>   
<td>
<br /><br />
<h1><u>Search by Student Details:</u></h1>
<b><u>First Name : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="fname" />
<br /><br />

<b><u>Last Name  : </u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="lname" />
<br /><br />

<b><u>CUID:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="cuid" />
<br /><br />

<b><u>Clemson e-mail id:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="cmid" size='6' maxlength='7'/>@clemson.edu
<br /><br />
<input type="submit" text="submit" value='show' name='majora'>
<br /><br />
</body>
</html>

<?php
if(isset($_POST['majora']))
{
 	 echo '<table border=7>';
     echo '<tr>';
     echo '<td width=100><center><b>First Name</b></center></td>';
     echo '<td width=100><center><b>Last Name</b></center></td>';
     echo '<td width=100><center><b>Department</b></center></td>';
     echo '<td width=100><center><b>email</b></center></td>';
	 echo '<td width=200><center><b>Skillset</b></center></td>';
	 echo '<td width=170><center><b>Contact#</b></center></td>';
     echo '</tr>';
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
     $cuid=$_POST['cuid'];
     $cmid=$_POST['cmid'].'@clemson.edu';
     if($fname != '' ||  $lname != '' ||  $cuid != '' ||  $cmid != '')
	{
     if(!isset($_SESSION['admin']))
		{
	 $query="select * from student where (fname='$fname' or lname='$lname' or cuid='$cuid' or email='$cmid') and ban=0";
		}
		else
		{
		$query="select * from student where fname='$fname' or lname='$lname' or cuid='$cuid' or email='$cmid'";
		}
     $result = mysql_query($query) or die(mysql_error());
     $num_rows = mysql_num_rows($result);
     while($row_num = mysql_fetch_array($result))
		{ 
		 if(!(isset($_SESSION['admin'])) && $row_num['activate']=='active' && $row_num['ban']== 0 || isset($_SESSION['admin']) && $row_num['activate']=='active')
			{
		 if(($fname == '' or $fname == $row_num['fname']) and($lname == '' or $lname == $row_num['lname']) and ($cuid == '' or $cuid == $row_num['cuid']) and ($cmid == '@clemson.edu' or $cmid == $row_num['email']))
	    {			 
          if($row_num['activate']=='active')
	       {
             if($row_num['contact']=='0')
              $row_num['contact']='-'?>
		       <tr>
              <td><center><?php echo $row_num['fname']; ?> </center></td>
              <td><center><?php echo $row_num['lname']; ?> </center></td>
              <td><center><?php echo $row_num['major']; ?> </center></td>
             <?php
    $disp = preg_split("/[\s,@]+/",$row_num['email']);
  if((isset($_SESSION['email']))) 
		{?>
  <td>       <center>       <?php echo $row_num['email']; ?> </center></td>
  <?php } ?>

  <?php
  if((isset($_SESSION['name'])) || (isset($_SESSION['admin']))) 
		{?>
  <td>       <center> <a href ="studentprofile.php?student=<?php echo $disp[0]; ?>"><?php echo $row_num['email']; ?></a> </center></td>  
            	<?php

  $_SESSION['disp']=$disp[0];
}

$skill = rtrim($row_num['skill'], ",");

?>
  <td>       <center>       <?php echo $skill; ?> </center></td>
  <td>       <center>       <?php echo $row_num['contact']; ?> </center></td>
    	</tr>
   <?php	}

        }?>
		</table>
	<?php
	mysql_close();
	}
		}
}
}
}
?>
</td>
<html>
<body bgcolor='FFFFCC'>
</body>
</html>

