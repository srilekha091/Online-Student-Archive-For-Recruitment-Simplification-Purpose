<?php
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
	echo '</div>';
	echo '<a href="student_contacts_page_details.php" align="left"><h1>search by student details</a>';
	if(isset($_SESSION['admin']))
	{
echo	'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	echo '<a href="search_recruiters.php">recruiter search</a>';
	}
	echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	if((isset($_SESSION['name'])) && (isset($_SESSION['recruiter_id']))) 
	echo '<a href="student_skill_details.php" align="right">search for students by skill</h1></a>';
	?>

<html>
<body>
<form method="post"> 
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
<p><a href= "inbox.php"> <h3>Message Tool</h3></a></p>
<br>
<p><a href= "media_add_student.php"><h3> Add Files</h3> </a></p> 
<br>
<p><a href= "media_delete_student.php"><h3> Delete Files</h3> </a></p> 
<br>
<p><a href= "student_update_profile.php"> <h3>Update Profile</h3> </a></p>
<?php
	   }
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
<?php if(!isset($_SESSION['admin']))
	{ ?>
</td>	
<?php 
	} ?>
<td>
<br /><br />
<h1><u>Search by Department:</u></h1>
<br>
<b><u>Please select a major to go to the contacts page:</u></b>
<select name="major">
<option value="Accounting">Accounting</option>
<option value="Administration and Supervision">Administration and Supervision</option>
<option value="Agricultural Education">Agricultural Education</option>
<option value="Agricultural Mechanization and Business">Agricultural Mechanization and Business</option>
<option value="Animal and Veterinary Sciences">Animal and Veterinary Sciences</option>
<option value="Applied Economics">Applied Economics</option>
<option value="Applied Economics and Statistics">Applied Economics and Statistics</option>
<option value="Applied Physiology">Applied Physiology</option>
<option value="Applied Sociology">Applied Sociology</option>
<option value="Art">Art</option>
<option value="Architecture">Architecture</option>
<option value="Automotive Engineering">Automotive Engineering</option>
<option value="Biochemistry">Biochemistry</option>
<option value="Biochemistry and Molecular Biology">Biochemistry and Molecular Biology</option>
<option value="Bioengineering">Bioengineering</option>
<option value="Biotechnology">Biotechnology</option>
<option value="Biological Sciences">Biological Sciences</option>
<option value="Biosystems Engineering">Biosystems Engineering</option>
<option value="Business Administration">Business Administration</option>
<option value="Ceramic and Material Engineering">Ceramic and Material Engineering</option>
<option value="Chemical Engineering">Chemical Engineering</option>
<option value="Chemistry">Chemistry</option>
<option value="City and Regional Planning">City and Regional Planning</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Communication Studies">Communication Studies</option>
<option value="Computer Engineering">Computer Engineering</option>
<option value="Computer Information Systems">Computer Information Systems</option>
<option value="Computer Science">Computer Science</option>
<option value="Construction Science and Management">Construction Science and Management</option>
<option value="Counselor Education">Counselor Education</option>
<option value="Curriculum and Instruction">Curriculum and Instruction</option>
<option value="Digital Production Arts">Digital Production Arts</option>
<option value="Early childhood Education">Early childhood Education</option>
<option value="Economics">Economics</option>
<option value="Educational Leadership">Educational Leadership</option>
<option value="Electrical Engineering">Electrical Engineering</option>
<option value="Elementary Education">Elementary Education</option>
<option value="English">English</option>
<option value="Entomology">Entomology</option>
<option value="Environmental and Natural Resources">Environmental and Natural Resources</option>
<option value="Environmental Engineering and Science">Environmental Engineering and Science</option>
<option value="Environmental Toxicology">Environmental Toxicology</option>
<option value="Financial Management">Financial Management</option>
<option value="Food, Nutrition and Culinary Sciences">Food, Nutrition and Culinary Sciences</option>
<option value="Food Sciences">Food Sciences</option>
<option value="Food Technology">Food Technology</option>
<option value="Forest Resources Management">Forest Resources Management</option>
<option value="Genetics">Genetics</option>
<option value="Geology">Geology</option>
<option value="Graphic Communications">Graphic Communications</option>
<option value="Healthcare Genetics">Healthcare Genetics</option>
<option value="Health Science">Health Science</option>
<option value="Historic Preservation">Historic Preservation</option>
<option value="History">History</option>
<option value="Horticulture">Horticulture</option>
<option value="Human Factor Psychology">Human Factor Psychology</option>
<option value="Human Resource Development">Human Resource Development</option>
<option value="Hydrogeology">Hydrogeology</option>
<option value="Industrial Engineering">Industrial Engineering</option>
<option value="Industrial Management">Industrial Management</option>
<option value="Industrial/Organizational Psychology">Industrial/Organizational Psychology</option>
<option value="International Family and Community Studies">International Family and Community Studies</option>
<option value="Landscape Architecture">Landscape Architecture</option>
<option value="Language and International Health">Language and International Health</option>
<option value="Language and International Trade">Language and International Trade</option>
<option value="Management">Management</option>
<option value="Marketing">Marketing</option>
<option value="Materials Science and Engineering">Materials Science and Engineering</option>
<option value="Mathematical Sciences">Mathematical Sciences</option>
<option value="Mechanical Engineering">Mechanical Engineering</option>
<option value="Microbiology">Microbiology</option>
<option value="Middle Level Education">Middle Level Education</option>
<option value="Modern Languages">Modern Languages</option>
<option value="Nursing">Nursing</option>
<option value="Packaging Science">Packaging Science</option>
<option value="Parks, Recreation and Tourism Management">Parks, Recreation and Tourism Management</option>
<option value="Philosophy">Philosophy</option>
<option value="Performing Arts">Performing Arts</option>
<option value="Physics">Physics</option>
<option value="Planning, Design + Built Environment">Planning, Design + Built Environment</option>
<option value="Plant and Environmental Sciences">Plant and Environmental Sciences</option>
<option value="Policy Studies">Policy Studies</option>
<option value="Political Science">Political Science</option>
<option value="Polymer and Fiber chemistry">Polymer and Fiber Chemistry</option>
<option value="Polymer and Fiber Science">Polymer and Fiber Science</option>
<option value="Prepharmacy">Prepharmacy</option>
<option value="Preprofessional Health Studies">Preprofessional Health Studies</option>
<option value="Prerehabilitation Sciences">Prerehabilitation Sciences</option>
<option value="Preveterinary Medicine">Preveterinary Medicine</option>
<option value="Production Studies in Performing Arts">Production Studies in Performing Arts</option>
<option value="Professional Communication">Professional Communication</option>
<option value="Psychology">Psychology</option>
<option value="Public Administration">Public Administration</option>
<option value="Reading">Reading</option>
<option value="Real Estate Development">Real Estate Development</option>
<option value="Rhetorics, Communication and Information Design">Rhetorics, Communication and Information Design</option>
<option value="Science Teaching">Science Teaching</option>
<option value="Secondary Education">Secondary Education</option>
<option value="Sociology and Anthropology">Sociology and Anthropology</option>
<option value="Soils and Sustainable Crop Systems">Soils and Sustainable Crop Systems</option>
<option value="Special Education">Special Education</option>
<option value="Turfgrass">Turfgrass</option>
<option value="Visual Arts">Visual Arts</option>
<option value="Wildlife and Fisheries Biology">Wildlife and Fisheries Biology</option>
<option value="Youth Development and Leadership">Youth Development and Leadership</option>
</select>
<br /><br />
<input type="submit" text="submit" value='show' name='majora'>
<br /><br />
</form>
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
echo '<td width=170><center><b>email</b></center></td>';
echo '<td width=200><center><b>Skillset</b></center></td>';
echo '<td width=100><center><b>Contact#</b></center></td>';
echo '</tr>';
	$major=$_POST['major'];
	if(!isset($_SESSION['admin']))
	{
	$query="select * from student where major='$major' and ban=0";
	}
	else
	{
	 $query="select * from student where major='$major'";
	}
    $result = mysql_query($query) or die(mysql_error());
    while($row_num = mysql_fetch_array($result))
	{
	if(!(isset($_SESSION['admin'])) && $row_num['activate']=='active' && $row_num['ban']== 0 || isset($_SESSION['admin']) && $row_num['activate']=='active')
	{
     if($row_num['contact']=='0')
       $row_num['contact']='-'?>
		<tr>
  <td>       <center>       <?php echo $row_num['fname']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['lname']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['major']; ?> </center></td>
<?php
  if(!(isset($_SESSION['name'])) && !(isset($_SESSION['admin']))) 
		{?>
  <td>       <center>       <?php echo $row_num['email']; ?> </center></td>
  <?php } ?>

  <?php
  $disp = preg_split("/[\s,@]+/",$row_num['email']);
//  echo 'keywords[0] is '.$keywords[0];
//  $disp=substr($row_num['email'],0,7);
  $_SESSION['disp']=$disp[0];
echo   $_SESSION['disp'];
  if(!(isset($_SESSION['email']))) 
		{?>
  <td>       <center> <a href ="studentprofile.php?student=<?php echo $disp[0]; ?>"><?php echo $row_num['email']; ?></a> </center></td>  
<?php	 
}
?>
  <td>       <center>       <?php echo $row_num['skill']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['contact']; ?> </center></td>
    	</tr>
<?php	}


	}?>
	</table>
	<?php
	mysql_close();
}

}
?>
</td>
<html>
<body bgcolor='FFFFCC'>
</body>
</html>



