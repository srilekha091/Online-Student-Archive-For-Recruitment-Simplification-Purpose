<?php
error_reporting(0);
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email']))) 
{
die("You are not logged in.Click <a href='students_login.php'>here to login</a>");
}	
else
{
	$_SESSION['ski']=$_POST['name'];
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
<b>Skill:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type='text' name='name' value='<?php echo $_SESSION['ski'] ?>' /> 
&nbsp&nbsp
<br /><br />
<input type="radio" name="conveyance" value="AND" />
Include all the keywords in the skill textbox
&nbsp&nbsp
<br /><br />
<input type="radio" name="conveyance" value="OR" /> 
Include atleast one of the keywords in the skill textbox
<br /><br />
<!--
<b>Department:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type='text' name='dept' />  -->
<b><u>Select your major:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<select name="dept">
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
	$dept=$_POST['dept'];
	//echo $name;
	$len=0;
	echo '<br /><br />';
    $keywords = preg_split("/[\s,]+/", $name);
	foreach($keywords as $name)
	{
		$len++;
	}
	$check = 0;
	if(isset($_POST['conveyance']))
	{
	foreach($keywords as $name)
	{
	if($dept != '' ||  $name != ' ')
	{
	$query="select * from student where skill regexp '^$name | $name$ | $name' OR    major='$dept'";
    $result = mysql_query($query) or die(mysql_error());
	$coun=0;
	if($_POST['conveyance']  == 'AND')
		{
			$k=$len-1;
		}
	elseif($_POST['conveyance'] == 'OR')
		{
			$k=0;
		}
    while($row_num = mysql_fetch_array($result))
	{	
		$coun=0;
//			echo 'array is ';
		    foreach($array as $t)
		{
//				echo $t." ";
				if($t == $row_num['cuid'])
					$coun++;
		}
//		echo '<br>';
//		echo " ".$coun;
        
		
		if($coun == $k){
	      	 $skill=$row_num['skill'];	
   			 $pos = strpos($skill,$name.'');
             if($pos === false) 
			 $chec = 0;             
              else 
   		      $chec = 1;
    if(($dept == '' or $dept == $row_num['major']) and ($name == '' or $chec > 0))
		{	
		
	if($row_num['activate']=='active' && $row_num['ban']== 0)
	{		
     if($row_num['contact']=='0')
       $row_num['contact']='-';
	 if($row_num['graduation']=='' | $row_num['graduation']=='-' | $row_num['graduation']=='NULL')
       $row_num['graduation']='Information N/A'; 
  $disp = preg_split("/[\s,@]+/",$row_num['email']);
  $_SESSION['disp']=$disp[0];
?>
		<tr width=100>
  <td width=100>       <center>       <?php echo $row_num['fname']; ?> </center></td>
  <td width=100>       <center>       <?php echo $row_num['lname']; ?> </center></td>
  <td width=100>       <center>       <?php echo $row_num['graduation']; ?> </center></td>
  <td width=100>       <center>       <?php echo $row_num['major']; ?> </center></td>
  <td width=100>       <center> <a href ="studentprofile.php?student=<?php echo $disp[0]; ?>"><?php echo $row_num['email']; ?> </a> </center></td>  
  <td width=100>       <center>       <?php echo $row_num['contact']; ?> </center></td>
  <td width=100>       <center>       <?php echo $skill; ?> </center></td>
    	</tr>
<?php 
	if($_POST['conveyance']  == 'OR')
	{
  		$array[]=$row_num['cuid'];			    	
	}

	} } } // closing $coun loop
	if($_POST['conveyance']  == 'AND')
	{
  		$array[]=$row_num['cuid'];			    	
	}

	} //while loop?>
	
	<?php
	}
}//foreach loop
}
echo '</table>';
}
}
?>
</td></tr></table>



<html>
<body bgcolor='FFFFCC'>
</body>
</html>



