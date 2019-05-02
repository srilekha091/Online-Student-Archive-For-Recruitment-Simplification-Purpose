<?php
error_reporting(0);
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
$cuid=$_SESSION['cuid'];
   ?>
<div style="background-color:#FF9912;width:1300px;height:100px">
<br>
<h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="company_selection_page.php">Company Selection Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="logout.php">Logout</a></h2>
</div>
<form method="POST" >
<table border="4" width="1270" height="592">
<tr valign="top">
<td width="300"> 
<br><br>
<?php
   $fname=$_SESSION['fname']; 
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
   <p><a href= "student_update_profile.php"> <h3>Update Profile</h3> </a></p> 
</td>	
<br><br>
 </BODY>
<?php
   $query="select * from student where cuid='$cuid'";
   $result = mysql_query($query);
   while($row_num = mysql_fetch_array($result))
   {
   ?>
   
<form method="post">
<td>
<center><h1><u><?php echo $_SESSION['fname'].'\'s'. ' Profile Page'; ?></u></h1></center>
<br />
<h2>Update Profile:</h2>
<br / >
<b><u>First Name :</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="fname" value="<?php echo $row_num['fname'];  ?>"/>
   <?php
   if(isset($_POST['update']))
	   {
   $query="update student set fname='$_POST[fname]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
 header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />
<b><u>Last Name:</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="lname" value="<?php echo $row_num['lname'];  ?>" />
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update student set lname='$_POST[lname]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
   header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />
<b><u>Password :</u> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="password" name="pass" value="<?php echo $row_num['password'];  ?>" />
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update student set password='$_POST[pass]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />

<b><u>Major:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
<?php
	   if(isset($_POST['update']))
	   {
   $query="update student set major='$_POST[major]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />


<b><u>Graduation : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>

<input type="text" name="graduation" value="<?php echo $row_num['graduation'];  ?>"/>YYYY-MM-DD
   <?php
	   if(isset($_POST['update']))
	   {
   $query="update student set graduation='$_POST[graduation]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />

<b><u>Skills : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>

<input type="text" name="skill" size='45' value="<?php echo $row_num['skill'];  ?>"/>(xxx yyy zzz)
   <?php
	   if(isset($_POST['update']))
	   {
   $query="update student set skill='$_POST[skill]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />

<b><u>Address line 1 : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>

<input type="text" name="add1" value="<?php echo $row_num['addressline1'];  ?>"/>
   <?php
	   if(isset($_POST['update']))
	   {
   $query="update student set addressline1='$_POST[add1]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />
<b><u>Address line 2:</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="add2" value="<?php echo $row_num['addressline2'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update student set addressline2='$_POST[add2]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />
<b><u>City : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="city" value="<?php echo $row_num['city'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update student set city='$_POST[city]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />

<b><u>State : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="state" value="<?php echo $row_num['state'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update student set state='$_POST[state]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />


<b><u>Country:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<SELECT name="cc">
<OPTION VALUE=Australia>Australia</OPTION>
<OPTION VALUE=China>China</OPTION>
<OPTION VALUE=Egypt>Egypt</OPTION>
<OPTION VALUE=France>France</OPTION>
<OPTION VALUE=Georgia>Georgia</OPTION>
<OPTION VALUE=Germany>Germany</OPTION>
<OPTION VALUE=India>India</OPTION>
<OPTION VALUE=Japan>Japan</OPTION>N>
<OPTION VALUE=Mozambique>Mozambique</OPTION>
<OPTION VALUE=Myanmar>Myanmar</OPTION>
<OPTION VALUE=Namibia>Namibia</OPTION>
<OPTION VALUE=Nauru>Nauru</OPTION>
<OPTION VALUE=Nepal>Nepal</OPTION>
<OPTION VALUE=Netherlands>Netherlands</OPTION>
<OPTION VALUE=NetherlandsAntilles>Netherlands Antilles</OPTION>
<OPTION VALUE=NewCaledonia>New Caledonia</OPTION>
<OPTION VALUE=NewZealand>New Zealand</OPTION>
<OPTION VALUE=Nicaragua>Nicaragua</OPTION>
<OPTION VALUE=Niger>Niger</OPTION>
<OPTION VALUE=Nigeria>Nigeria</OPTION>
<OPTION VALUE=Niue>Niue</OPTION>
<OPTION VALUE=NorfolkIsland>Norfolk Island</OPTION>
<OPTION VALUE=NorthernMarianaIs.>Northern Mariana Is.</OPTION>
<OPTION VALUE=Norway>Norway</OPTION>
<OPTION VALUE=Oman>Oman</OPTION>
<OPTION VALUE=Pakistan>Pakistan</OPTION>
<OPTION VALUE=Palau>Palau</OPTION>
<OPTION VALUE=Panama>Panama</OPTION>
<OPTION VALUE=PapuaNewGuinea>Papua New Guinea</OPTION>
<OPTION VALUE=Paraguay>Paraguay</OPTION>
<OPTION VALUE=Peru>Peru</OPTION>
<OPTION VALUE=Philippines>Philippines</OPTION>
<OPTION VALUE=Pitcairn>Pitcairn</OPTION>
<OPTION VALUE=Poland>Poland</OPTION>
<OPTION VALUE=Portugal>Portugal</OPTION>
<OPTION VALUE=PuertoRico>Puerto Rico</OPTION>
<OPTION VALUE=Qatar>Qatar</OPTION>
<OPTION VALUE=Reunion>Reunion</OPTION>
<OPTION VALUE=Romania>Romania</OPTION>
<OPTION VALUE=RussianFederation>Russian Federation</OPTION>
<OPTION VALUE=Rwanda>Rwanda</OPTION>
<OPTION VALUE=SaintKitts&Nevis>Saint Kitts and Nevis</OPTION>
<OPTION VALUE=SaintLucia>Saint Lucia</OPTION>
<OPTION VALUE=St.Vincent&Grenadines>St. Vincent & Grenadines</OPTION>
<OPTION VALUE=Samoa>Samoa</OPTION>
<OPTION VALUE=SanMarino>San Marino</OPTION>
<OPTION VALUE=SaoTome&Principe>Sao Tome & Principe</OPTION>
<OPTION VALUE=SaudiArabia>Saudi Arabia</OPTION>
<OPTION VALUE=Senegal>Senegal</OPTION>
<OPTION VALUE=Seychelles>Seychelles</OPTION>
<OPTION VALUE=SierraLeone>Sierra Leone</OPTION>
<OPTION VALUE=Singapore>Singapore</OPTION>
<OPTION VALUE=Slovakia>Slovakia (Slovak Republic)</OPTION>
<OPTION VALUE=Slovenia>Slovenia</OPTION>
<OPTION VALUE=SolomonIslands>Solomon Islands</OPTION>
<OPTION VALUE=Somalia>Somalia</OPTION>
<OPTION VALUE=SouthAfrica>South Africa</OPTION>
<OPTION VALUE=S.Georgia&S.SandwichIs.>S.Georgia & S.Sandwich Is.</OPTION>
<OPTION VALUE=Spain>Spain</OPTION>
<OPTION VALUE=SriLanka>Sri Lanka</OPTION>
<OPTION VALUE=St.Helena>St. Helena</OPTION>
<OPTION VALUE=St.Pierre & Miquelon>St. Pierre & Miquelon</OPTION>
<OPTION VALUE=Sudan>Sudan</OPTION>
<OPTION VALUE=Suriname>Suriname</OPTION>
<OPTION VALUE=Svalbard&JanMayenIs.>Svalbard & Jan Mayen Is.</OPTION>
<OPTION VALUE=Swaziland>Swaziland</OPTION>
<OPTION VALUE=Sweden>Sweden</OPTION>
<OPTION VALUE=Switzerland>Switzerland</OPTION>
<OPTION VALUE=SyrianArabRepublic>Syrian Arab Republic</OPTION>
<OPTION VALUE=Taiwan>Taiwan</OPTION>
<OPTION VALUE=Tajikistan>Tajikistan</OPTION>
<OPTION VALUE=Tanzania>Tanzania</OPTION>
<OPTION VALUE=Thailand>Thailand</OPTION>
<OPTION VALUE=Togo>Togo</OPTION>
<OPTION VALUE=Tokelau>Tokelau</OPTION>
<OPTION VALUE=Tonga>Tonga</OPTION>
<OPTION VALUE=Trinidad&Tobago>Trinidad and Tobago</OPTION>
<OPTION VALUE=Tunisia>Tunisia</OPTION>
<OPTION VALUE=Turkey>Turkey</OPTION>
<OPTION VALUE=Turkmenistan>Turkmenistan</OPTION>
<OPTION VALUE=Turks&CaicosIslands>Turks & Caicos Islands</OPTION>
<OPTION VALUE=Tuvalu>Tuvalu</OPTION>
<OPTION VALUE=UnitedStates>United States</OPTION>
<OPTION VALUE=Uganda>Uganda</OPTION>
<OPTION VALUE=Ukraine>Ukraine</OPTION>
<OPTION VALUE=UnitedArabEmirates>United Arab Emirates</OPTION>
<OPTION VALUE=U.S.MinorOutlyingIs.>U.S. Minor Outlying Is.</OPTION>
<OPTION VALUE=Uruguay>Uruguay</OPTION>
<OPTION VALUE=Uzbekistan>Uzbekistan</OPTION>
<OPTION VALUE=Vanuatu>Vanuatu</OPTION>
<OPTION VALUE=Vatican>Vatican (Holy See)</OPTION>
<OPTION VALUE=Venezuela>Venezuela</OPTION>
<OPTION VALUE=VietNam>Viet Nam</OPTION>
<OPTION VALUE=VirginIslands>Virgin Islands (British)</OPTION>
<OPTION VALUE=VirginIslands>Virgin Islands (U.S.)</OPTION>
<OPTION VALUE=Wallis&FutunaIs.>Wallis & Futuna Is.</OPTION>
<OPTION VALUE=WesternSahara>Western Sahara</OPTION>
<OPTION VALUE=Yemen>Yemen</OPTION>
<OPTION VALUE=Yugoslavia>Yugoslavia</OPTION>
<OPTION VALUE=Zaire>Zaire</OPTION>
<OPTION VALUE=Zambia>Zambia</OPTION>
<OPTION VALUE=Zimbabwe>Zimbabwe</OPTION>
</SELECT>
<?php
	if(isset($_POST['update']))
	   {
   $query1="update student set country='$_POST[cc]' where cuid='$row_num[cuid]'";
   $result1= mysql_query($query1);
  header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />


<b><u>Zipcode : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="code" value="<?php echo $row_num['zipcode'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update student set zipcode='$_POST[code]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br />
<b><u>Contact:</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="con" value="<?php echo $row_num['contact'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update student set contact='$_POST[con]' where cuid='$row_num[cuid]'";
   $result = mysql_query($query);
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/studentprofile.php');
	   }
   ?>
<br /><br />
<input type="submit" text="submit" value="update" name="update">
</form>
<?php
}?>


</td>
<html>
<body bgcolor='FFFFCC'>
</body>
</html>