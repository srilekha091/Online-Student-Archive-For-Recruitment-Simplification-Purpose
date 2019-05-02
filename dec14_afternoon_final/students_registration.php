<?php
$flag = 0;
?>
<div style="background-color:#FF9912;width:1300px;height:100px">
<br />
<h2><a href ="homepage.php">Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="login.php">Login Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="registration.php">Registration Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="overview.pdf">Overview Page</a></h2>
</div>
<br><br>
 </BODY>
<b><h2><u><center>STUDENT REGISTRATION FORM</center></h2></u></b>
<?php
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(isset($_POST['register']))
{
$fname=$_POST['fname'];
$_SESSION['fname']=$fname;
$lname=$_POST['lname'];
$_SESSION['lname']=$lname;
$cuid=$_POST['cuid'];
$_SESSION['cuid']=$cuid;
$cmid=$_POST['cmid'].'@clemson.edu';
$_SESSION['cmid']=$_POST['cmid'];
$pwd=$_POST['pwd'];
$_SESSION['pwd']=$pwd;
if(isset($_POST['mof']))
	{
$gender=$_POST['mof'];
$_SESSION['gender']=$gender;
	}
$major=$_POST['major'];
$_SESSION['major']=$major;
$address1=$_POST['address1'];
$_SESSION['address1']=$address1;
$address2=$_POST['address2'];
$_SESSION['address2']=$address2;
$city=$_POST['city'];
$_SESSION['city']=$city;
$state=$_POST['state'];
$_SESSION['state']=$state;
$country=$_POST['country'];
$_SESSION['country']=$country;
$code=$_POST['code'];
$_SESSION['code']=$code;
$contact=$_POST['contact'];
$_SESSION['contact']=$contact;
$skill=$_POST['skill'];
$_SESSION['skill']=$skill;

if($fname == '')
{
$flag=1;
echo '<br /><br />';
echo '<h3>First name field cannot be empty!</h3>';
echo '<br /><br />';
echo '<a href="students_registration.php">Take me back to student registration screen</a>';
echo '<br /><br />';
}
elseif($lname == '')
{
$flag=1;
echo '<br /><br />';
echo '<h3>Last name field cannot be empty!</h3>';
echo '<br /><br />';
echo '<a href="students_registration.php">Take me back to student registration screen</a>';
echo '<br /><br />';
}
elseif($cuid == '' || strlen($cuid) != '9')
{
$flag=1;
echo '<br /><br />';
echo '<h3>Invalid CUID field!</h3>';
echo '<br /><br />';
echo '<a href="students_registration.php">Take me back to student registration screen</a>';
echo '<br /><br />';
}
elseif($pwd == '')
{
$flag=1;
echo '<br /><br />';
echo '<h3>Cannot proceed with the registration as the password field cannot be null !</h3>';
echo '<br /><br />';
echo '<a href="students_registration.php">Take me back to student registration screen</a>';
echo '<br /><br />';
}

else
{
$queryy="select * from student where CUID='$cuid'";
$resultt=mysql_query($queryy) or die(mysql_error());
$row_num=mysql_fetch_row($resultt);
if($row_num[2] != NULL)
 {
	$flag=1;
  echo '<br /><h3>Account with the same CUID already exists !</h3><br /><br />';
  echo '<br /><br />';
  echo '<a href="students_registration.php">Take me back to student registration screen</a>';
  echo '<br /><br />';
  exit;
 }
 $queryy="select * from student where email='$cmid'";
 $resultt=mysql_query($queryy) or die(mysql_error());
 $row_num=mysql_fetch_row($resultt);
 if($row_num[3] != NULL)
 {
  $flag=1;
  echo '<br /><h3>Account with the same Clemson e-mail already exists !</h3><br /><br />';
  echo '<br /><br />';
  echo '<a href="students_registration.php">Take me back to student registration screen</a>';
  echo '<br /><br />';
 }

else
	{
	$flag=1;
        $activation_key=mt_rand();
		$to      = $cmid;
        $subject = " Students Registration Confirmation E-Mail";
		$message = "Welcome to our website!\r\rYou have completed registration with our system using this e-mail id. However, you are just one step away from accessing our system. Please complete your registration by clicking the following link:\rhttp://pba.cs.clemson.edu/~f09t10/Project/Milestone1/student_registration_confirmation.php?$activation_key\r\r
		If you received this e-mail by mistake, please ignore it and you will be removed from our mailing list.\r\rRegards,\r\r Clemson E-Shelf Team";

		$headers = 'From: systemadmin@unknown.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
	   $query="INSERT INTO student VALUES ('$fname','$lname','$cuid','$cmid','$pwd','$gender','$address1','$address2','$city','$country','$code','$contact','$major','$state','$activation_key','inactive','profiles/default_profile.jpg','-','$skill','0')";
       $result=mysql_query($query);
	   $query1="insert into registered_users values ('','$cmid','$fname','$lname')";
	   $result1=mysql_query($query1);
	 ?>
        	 <br />
           <b><h2>An e-mail requesting your confirmation has been generated. Click on the link provided in your e-mail to activate your account.</h2></b>
           <br /><br /> 

  <?php
	}
}
mysql_close();
}
?>

<html>
<body bgcolor='FFFFCC'>
<form method='post'>
<br />
<?php
if($flag == 0)
{?>
<table>
<tr>
<td width='600'>
<b>*<u>First Name : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="fname" value="<?php if(isset($_SESSION['fname'])){ echo $_SESSION['fname'];} ?>"></input>
<br /><br />

<b>*<u>Last Name  : </u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="lname" value="<?php if(isset($_SESSION['lname'])){ echo $_SESSION['lname'];} ?>"/>
<br /><br />

<b>*<u>CUID:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="cuid" value="<?php if(isset($_SESSION['cuid'])){ echo $_SESSION['cuid'];} ?>" size='9' maxlength='9'/>
<br /><br />

<b>*<u>Clemson e-mail id:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="cmid" size='6' maxlength='7' value="<?php if(isset($_SESSION['cmid'])){ echo $_SESSION['cmid'];} ?>" />@clemson.edu
<br /><br />
<b>*<u>Enter your password:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="password" name="pwd" value="<?php if(isset($_SESSION['pwd'])){ echo $_SESSION['pwd'];} ?>"/>
<br /><br />

<b><u>Gender:</u></b>
<br />
<p style="font-family:verdana;color:black">
<input type="radio" name="mof" value="Male" /> 
Male
<br />
<input type="radio" name="mof" value="Female" /> 
Female
<br />
</p>
<b><u>Skills:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="skill" size='40' value="<?php if(isset($_SESSION['skill'])){ echo $_SESSION['skill'];} ?>" />(xxx yyy zzz)

</td>
<td>
<b><u>Select your major:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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


<b><u>Address Line 1:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="address1" value="<?php if(isset($_SESSION['address1'])){ echo $_SESSION['address1'];} ?>"/>
<br /><br />

<b><u>Address Line 2:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="address2" value="<?php if(isset($_SESSION['address2'])){ echo $_SESSION['address2'];} ?>"/>
<br /><br />

<b><u>City:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="city" value="<?php if(isset($_SESSION['city'])){ echo $_SESSION['city'];} ?>"/>
<br /><br />

<b><u>State:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="state" value="<?php if(isset($_SESSION['state'])){ echo $_SESSION['state'];} ?>"/>
<br /><br />


<b><u>Select your Country:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<SELECT NAME="country" SIZE="1">
<OPTION VALUE=Australia>Australia</OPTION>
<OPTION VALUE=Afghanistan>Afghanistan</OPTION>
<OPTION VALUE=Albania>Albania</OPTION>
<OPTION VALUE=Algeria>Algeria</OPTION>
<OPTION VALUE=AmericanSamoa>American Samoa</OPTION>
<OPTION VALUE=Andorra>Andorra</OPTION>
<OPTION VALUE=Angola>Angola</OPTION>
<OPTION VALUE=Anguilla>Anguilla</OPTION>
<OPTION VALUE=Antarctica>Antarctica</OPTION>
<OPTION VALUE=Antigua&Barbuda>Antigua and Barbuda</OPTION>
<OPTION VALUE=Argentina>Argentina</OPTION>
<OPTION VALUE=Armenia>Armenia</OPTION>
<OPTION VALUE=Aruba>Aruba</OPTION>
<OPTION VALUE=Austria>Austria</OPTION>
<OPTION VALUE=Azerbaijan>Azerbaijan</OPTION>
<OPTION VALUE=Bahamas>Bahamas</OPTION>
<OPTION VALUE=Bahrain>Bahrain</OPTION>
<OPTION VALUE=Bangladesh>Bangladesh</OPTION>
<OPTION VALUE=Barbados>Barbados</OPTION>
<OPTION VALUE=Belarus>Belarus</OPTION>
<OPTION VALUE=Belgium>Belgium</OPTION>
<OPTION VALUE=Belize>Belize</OPTION>
<OPTION VALUE=Benin>Benin</OPTION>
<OPTION VALUE=Bermuda>Bermuda</OPTION>
<OPTION VALUE=Bhutan>Bhutan</OPTION>
<OPTION VALUE=Bolivia>Bolivia</OPTION>
<OPTION VALUE=Bosnia&Herzegowina>Bosnia and Herzegowina</OPTION>
<OPTION VALUE=Botswana>Botswana</OPTION>
<OPTION VALUE=BouvetIsland>Bouvet Island</OPTION>
<OPTION VALUE=Brazil>Brazil</OPTION>
<OPTION VALUE=BritishIndianOceanTerr.>British Indian Ocean Terr.</OPTION>
<OPTION VALUE=BruneiDarussalam>Brunei Darussalam</OPTION>
<OPTION VALUE=Bulgaria>Bulgaria</OPTION>
<OPTION VALUE=BurkinaFaso>Burkina Faso</OPTION>
<OPTION VALUE=Burundi>Burundi</OPTION>
<OPTION VALUE=Cambodia>Cambodia</OPTION>
<OPTION VALUE=Cameroon>Cameroon</OPTION>
<OPTION VALUE=Canada>Canada</OPTION>
<OPTION VALUE=CapeVerde>Cape Verde</OPTION>
<OPTION VALUE=CaymanIslands>Cayman Islands</OPTION>
<OPTION VALUE=CentralAfricanRepublic>Central African Republic</OPTION>
<OPTION VALUE=Chad>Chad</OPTION>
<OPTION VALUE=Chile>Chile</OPTION>
<OPTION VALUE=China>China</OPTION>
<OPTION VALUE=ChristmasIsland>Christmas Island</OPTION>
<OPTION VALUE=CocosIslands>Cocos (Keeling) Islands</OPTION>
<OPTION VALUE=Colombia>Colombia</OPTION>
<OPTION VALUE=Comoros>Comoros</OPTION>
<OPTION VALUE=Congo>Congo</OPTION>
<OPTION VALUE=CookIslands>Cook Islands</OPTION>
<OPTION VALUE=CostaRica>Costa Rica</OPTION>
<OPTION VALUE=CotedIvoire>Cote d'Ivoire</OPTION>
<OPTION VALUE=Croatia(Hrvatska)>Croatia (Hrvatska)</OPTION>
<OPTION VALUE=Cuba>Cuba</OPTION>
<OPTION VALUE=Cyprus>Cyprus</OPTION>
<OPTION VALUE=CzechRepublic>Czech Republic</OPTION>
<OPTION VALUE=Denmark>Denmark</OPTION>
<OPTION VALUE=Djibouti>Djibouti</OPTION>
<OPTION VALUE=Dominica>Dominica</OPTION>
<OPTION VALUE=DominicanRepublic>Dominican Republic</OPTION>
<OPTION VALUE=EastTimor>East Timor</OPTION>
<OPTION VALUE=Ecuador>Ecuador</OPTION>
<OPTION VALUE=Egypt>Egypt</OPTION>
<OPTION VALUE=ElSalvador>El Salvador</OPTION>
<OPTION VALUE=EquatorialGuinea>Equatorial Guinea</OPTION>
<OPTION VALUE=Eritrea>Eritrea</OPTION>
<OPTION VALUE=Estonia>Estonia</OPTION>
<OPTION VALUE=Ethiopia>Ethiopia</OPTION>
<OPTION VALUE=FalklandIslands/Malvinas>Falkland Islands/Malvinas</OPTION>
<OPTION VALUE=FaroeIslands>Faroe Islands</OPTION>
<OPTION VALUE=Fiji>Fiji</OPTION>
<OPTION VALUE=Finland>Finland</OPTION>
<OPTION VALUE=France>France</OPTION>
<OPTION VALUE=France,Metropolitan>France, Metropolitan</OPTION>
<OPTION VALUE=FrenchGuiana>French Guiana</OPTION>
<OPTION VALUE=FrenchPolynesia>French Polynesia</OPTION>
<OPTION VALUE=FrenchSouthernTerr.>French Southern Terr.</OPTION>
<OPTION VALUE=Gabon>Gabon</OPTION>
<OPTION VALUE=Gambia>Gambia</OPTION>
<OPTION VALUE=Georgia>Georgia</OPTION>
<OPTION VALUE=Germany>Germany</OPTION>
<OPTION VALUE=Ghana>Ghana</OPTION>
<OPTION VALUE=Gibraltar>Gibraltar</OPTION>
<OPTION VALUE=Greece>Greece</OPTION>
<OPTION VALUE=Greenland>Greenland</OPTION>
<OPTION VALUE=Grenada>Grenada</OPTION>
<OPTION VALUE=Guadeloupe>Guadeloupe</OPTION>
<OPTION VALUE=Guam>Guam</OPTION>
<OPTION VALUE=Guatemala>Guatemala</OPTION>
<OPTION VALUE=Guinea>Guinea</OPTION>
<OPTION VALUE=Guinea-Bissau>Guinea-Bissau</OPTION>
<OPTION VALUE=Guyana>Guyana</OPTION>
<OPTION VALUE=Haiti>Haiti</OPTION>
<OPTION VALUE=Heard&McDonaldIs.>Heard & McDonald Is.</OPTION>
<OPTION VALUE=Honduras>Honduras</OPTION>
<OPTION VALUE=HongKong>Hong Kong</OPTION>
<OPTION VALUE=Hungary>Hungary</OPTION>
<OPTION VALUE=Iceland>Iceland</OPTION>
<OPTION VALUE=India>India</OPTION>
<OPTION VALUE=Indonesia>Indonesia</OPTION>
<OPTION VALUE=Iran>Iran</OPTION>
<OPTION VALUE=Iraq>Iraq</OPTION>
<OPTION VALUE=Ireland>Ireland</OPTION>
<OPTION VALUE=Israel>Israel</OPTION>
<OPTION VALUE=Italy>Italy</OPTION>
<OPTION VALUE=Jamaica>Jamaica</OPTION>
<OPTION VALUE=Japan>Japan</OPTION>
<OPTION VALUE=Jordan>Jordan</OPTION>
<OPTION VALUE=Kazakhstan>Kazakhstan</OPTION>
<OPTION VALUE=Kenya>Kenya</OPTION>
<OPTION VALUE=Kiribati>Kiribati</OPTION>
<OPTION VALUE=KoreaNorth>Korea, North</OPTION>
<OPTION VALUE=KoreaSouth>Korea, South</OPTION>
<OPTION VALUE=Kuwait>Kuwait</OPTION>
<OPTION VALUE=Kyrgyzstan>Kyrgyzstan</OPTION>
<OPTION VALUE=LaoPeopleDem.Rep.>Lao People's Dem. Rep.</OPTION>
<OPTION VALUE=Latvia>Latvia</OPTION>
<OPTION VALUE=Lebanon>Lebanon</OPTION>
<OPTION VALUE=Lesotho>Lesotho</OPTION>
<OPTION VALUE=Liberia>Liberia</OPTION>
<OPTION VALUE=LibyanArabJamahiriya>Libyan Arab Jamahiriya</OPTION>
<OPTION VALUE=Liechtenstein>Liechtenstein</OPTION>
<OPTION VALUE=Lithuania>Lithuania</OPTION>
<OPTION VALUE=Luxembourg>Luxembourg</OPTION>
<OPTION VALUE=Macau>Macau</OPTION>
<OPTION VALUE=Macedonia>Macedonia</OPTION>
<OPTION VALUE=Madagascar>Madagascar</OPTION>
<OPTION VALUE=Malawi>Malawi</OPTION>
<OPTION VALUE=Malaysia>Malaysia</OPTION>
<OPTION VALUE=Maldives>Maldives</OPTION>
<OPTION VALUE=Mali>Mali</OPTION>
<OPTION VALUE=Malta>Malta</OPTION>
<OPTION VALUE=MarshallIslands>Marshall Islands</OPTION>
<OPTION VALUE=Martinique>Martinique</OPTION>
<OPTION VALUE=Mauritania>Mauritania</OPTION>
<OPTION VALUE=Mauritius>Mauritius</OPTION>
<OPTION VALUE=Mayotte>Mayotte</OPTION>
<OPTION VALUE=Mexico>Mexico</OPTION>
<OPTION VALUE=Micronesia>Micronesia</OPTION>
<OPTION VALUE=Moldova>Moldova</OPTION>
<OPTION VALUE=Monaco>Monaco</OPTION>
<OPTION VALUE=Mongolia>Mongolia</OPTION>
<OPTION VALUE=Montserrat>Montserrat</OPTION>
<OPTION VALUE=Morocco>Morocco</OPTION>
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
<br /><br />
<b><u>Zip-code:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="code" value="<?php if(isset($_SESSION['code'])){ echo $_SESSION['code'];} ?>" maxlength='5' size='4'/>
<br /><br />

<b><u>Contact#:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="contact" value="<?php if(isset($_SESSION['contact'])){ echo $_SESSION['contact'];} ?>" size='10' maxlength='10'/>
<br /><br />
</td>
</table>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" text="submit" value='Register' name='register'>


</form>
</body>
</html>

<?php
	session_destroy();
}
?>
