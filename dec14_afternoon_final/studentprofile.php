<?php
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');

if(!(isset($_SESSION['email'])) && !(isset($_SESSION['disp'])) && !(isset($_SESSION['admin'])) )
{
  die("You are not logged in. Click <a href='login.php'>here to login</a>");
}

else
{	
	if(isset($_SESSION['cuid']))
	{
		echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    	echo '<br>';
	    echo' <h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
       echo'  <a href ="company_selection_page.php">Company Selection      Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo '<a href ="logout.php">Logout</a></h2>';
		echo '</div>';
		echo '<br>';
		$cuid=$_SESSION['cuid'];
	}
		if(isset($_SESSION['name']) && isset($_SESSION['recruiter_id']))
		{         
		  $_SESSION['disp']=$_GET['student'];
    	  $_SESSION['email']=$_SESSION['disp'];
          echo '<div style="background-color:#FF9912;width:1200px;height:100px">';
		  echo '<br>';
          echo' <h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
          echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
          echo'  <a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
         echo '<a href ="logout.php">Logout</a></h2>';
		 echo '</div>';
         echo '<br>';
		}
	if(isset($_SESSION['admin']))
	{
		  $_SESSION['disp']=$_GET['student'];
		  $_SESSION['email']=$_SESSION['disp'];
		  echo '<div style="background-color:#FF9912;width:1200px;height:100px">';
		  echo '<br>';
          echo' <h2><a href ="student_contacts_page.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		  echo'<a href ="banned.php">Banned users</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
          echo'  <a href ="logout.php">Logout</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		  		  echo '<br>';
				  echo '<br>';
				  echo '<br>';
	}
}

		
if((isset($_SESSION['email'])) || (isset($_SESSION['admin'])))
{
	$email= $_SESSION['email']."@clemson.edu";
	$query="select * from student where email = '$email'";
	$result=mysql_query($query) or die(mysql_error());
	$row_num=mysql_fetch_array($result);
	$fname=$row_num["fname"];	
	$lname=$row_num["lname"];
	$cmid=$row_num["email"];
	$gender=$row_num["gender"];
	$addressline1=$row_num["addressline1"];
	$addressline2=$row_num["addressline2"];
	$city=$row_num["city"];
	$country=$row_num["country"];
	$zipcode=$row_num["zipcode"];
	$contact=$row_num["contact"];
	$major=$row_num["major"];
	$state=$row_num["state"];
	$graduation=$row_num["graduation"];
	$skill=$row_num["skill"];
    $skill = rtrim($skill, ",");
	$profile_pic=$row_num['profile_pic'];
    if($city == '0' || $city == '')
		$city='-';
    if($country == '0' || $country == '')
		$country='-';
    if($zipcode == '0' || $zipcode == '')
		$zipcode='-';
    if($contact == '0' || $contact == '')
		$contact='-';
	if($state == '0' || $state == '')
		$state='-';
	if($addressline1 == '0' || $addressline1 == '')
    $addressline1='-';
	if($addressline2 == '0' || $addressline2 == '')
    $addressline2='-';
	if($skill == '0' || $skill == '')
    $skill='-';
	if($graduation == '')
    $graduation='Not Available';?>

<form method="POST" >
<table border="4" width="1200" height="592">
<tr valign="top">
<td width="300"> 

<?php
	$_SESSION['fname']=$fname;
	echo '<img src="'.$profile_pic.'" width =200 height=150><br>';
	if(isset($_SESSION['cuid']))
	{
	$_SESSION['profile_pic']=$profile_pic;
	echo '<a href="change_profile_pic.php">Click here to change Profile pic</a><br><br>';
	?>
	<br> 
	
<p><a href="studentprofile.php"><h3>Home</h3></a></p> 
<br>
<p><a href= "inbox.php"> <h3>Message Tool</h3></a></p>
<br>
<p><a href= "media_add_student.php"><h3> Add Files </h3></a></p> 
<br>
<p><a href= "media_delete_student.php"><h3> Delete Files </h3></a></p> 
<br>
<p><a href= "student_update_profile.php"><h3> Update Profile </h3></a></p>
<br>
<p><a href= "calendar.php"><h3> Calendar </h3></a></p>
<?php } ?>
</td>	
<td>
<?php

echo '<h2>STUDENT</h2>'; 
if(isset($_SESSION['admin']))
{
	echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	   $key = preg_split("/[@]+/",$row_num['email']);
	   $display=$key[0];
       $query="select * from student where email='$email'";
	   $result=mysql_query($query);
	   $rr=mysql_fetch_array($result);
	   $ban=$rr['ban'];	   
   	   if(isset($_POST['ban']) || $ban == 1)
		 {	      
		  echo '<input type="submit" value="unban user" name="unban"></input>';
		 }		  
		else
		{	      
		  echo '<input type="submit" value="ban user" name="ban"></input>';
		 }

        if(isset($_POST['ban']))
		{	      
		 $q="update student set ban='1' where email='$email'";
		 $r=mysql_query($q);	
		 header('Location: studentprofile.php?student='.$display);
		}
	   if(isset($_POST['unban']))
	   {
	     $q="update student set ban='0' where email='$email'";
		 $r=mysql_query($q);	  
		 header('Location: studentprofile.php?student='.$display);
	    }
}
echo '<center><h1><u>'.$fname.'\'s Profile Page</u></h1>';
	echo '<table border=5 height=400> <tr >';
	echo '<td width="250">First Name </td><td width="250"> '.$fname;
	echo '</td></tr>';
	echo '<tr><td width="250">Last Name  </td><td width="250">'.$lname;
	echo '</td></tr>';	
	echo '<tr><td width="250">Email id  </td><td width="250">'.$cmid;
	echo '</td></tr>';
	echo '<tr><td width="250">Major</td><td width="250">'.$major;
	echo '</td></tr>';
	echo '<tr><td width="250">Graduation </td><td width="250">'.$graduation;
	echo '</td></tr>';
	echo '<tr><td width="250">Gender </td><td width="250">'.$gender;
	echo '</td></tr>';
	echo '<tr><td width="250">Address Line 1 </td><td width="250">'.$addressline1;
	echo '</td></tr>';
	echo '<tr><td width="250">Address Line 2 </td><td width="250">'.$addressline2;
	echo '</td></tr>';
	echo '<tr><td width="250">City </td><td width="250">'.$city;
	echo '</td></tr>';
	echo '<tr><td width="250">State </td><td width="250">'.$state;
	echo '</td></tr>';
	echo '<tr><td width="250">Country </td><td width="250">'.$country;
	echo '</td></tr>';
	echo '<tr><td width="250">Zipcode </td><td width="250">'.$zipcode;
	echo '</td></tr>';
	echo '<tr><td width="250">Contact # </td><td width="250">'.$contact;
	echo '</td></tr>';
	echo '<tr><td width="250">Skills </td><td width="250">'.$skill;
	echo '</td></tr>';
	echo '</table>';
	echo '</center>';
?>
</td>

<?php
$email=$_SESSION['email'];	
echo '<table border=7>';
echo '<tr>';
echo '<center><h1><u>'.$fname.'\'s Files</u></h1></center>';
echo '<b><td width=300><center><b><h3>File Name</h3></b></center></td></b>';
echo '<b><td width=300><center><b><h3>File Type</h3></b></center></td></b>';
echo '<b><td width=300><center><b><h3>File Size(KB)</h3></b></center></td></b>';
echo '<b><td width=300><center><b><h3>Date Uploaded(YYYY-MM-DD)</h3></b></center></td></b>';
echo '</tr>';
	$query="select * from media_student where (email='$email' AND (media_type LIKE '%audio%' OR media_type LIKE '%video%' OR media_type LIKE '%image%' OR media_type LIKE '%application%'))";
    $result = mysql_query($query) or die(mysql_error());
    while($row_num = mysql_fetch_array($result))
	{     
	
 				$filename=$row_num['media_title'];
				$filepath=$row_num['media_path'];
				$type=$row_num['media_type'];
				$mediaid=$row_num['media_id'];
	?>
		<tr>
  <td>              <a href="<?php echo $filepath.$filename ?>"><?php echo $filename ?></a></td>
  <td>              <?php echo $row_num['media_type']; ?> </td>
  <td>              <?php echo $row_num['media_size']/1000 . ' KB'; ?> </td>
  <td>              <?php echo $row_num['uploaddate']; ?> </td>
    	</tr>
<?php	}?>

	</table>


	<?php	
		if(!isset($_SESSION['cuid']))
		{
    		unset($_SESSION['email']);
		}
		
}
?>

	


<HTML>
<body bgcolor='FFFFCC'>
 </BODY>
</HTML>
