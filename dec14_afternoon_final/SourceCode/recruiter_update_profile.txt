<?php
error_reporting(0);
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
?>

<div style="background-color:#FF9912;width:1300px;height:100px">
<br>
<h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="logout.php">Logout</a></h2>
</div>
<br><br>
<form method="POST" >
<table border="4" width="1270" height="592">
<tr valign="top">
<td width="300"> 
<?php
	$fullname=$_SESSION['fullname'];
    $profile_pic=$_SESSION['profile_pic'];
	echo '<img src="'.$profile_pic.'" width =200 height=150><br>';
	?>
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
<?php
   $name=$_SESSION['name'];
   $query="select * from recruiter where username='$name'";
   $result = mysql_query($query);
   while($row_num = mysql_fetch_array($result))
   {
   ?>
<center><h2>RECRUITER PROFILE UPDATE PAGE</h2></center>
<br /><br /><br />
<b><u>Organization Name:</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="orgname" value="<?php echo $row_num['orgname'];  ?>" />
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update recruiter set orgname='$_POST[orgname]' where username='$row_num[username]'";
   $result = mysql_query($query);
   	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />

<b><u>Industry:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<select name="industry">
<option value="Agriculture & Related Sciences">Agriculture & Related Sciences</option>
<option value="Architecture & Related Programs">Architecture & Related Programs</option>
<option value="Arts, Visual & Performing">Arts, Visual & Performing</option>
<option value="Biological & Biomedical Sciences">Biological & Biomedical Sciences</option>
<option value="Business, Management, & Marketing">Business, Management, & Marketing</option>
<option value="Computer & Information Sciences">Computer & Information Sciences</option>
<option value="Education">Education</option>
<option value="Engineering">Engineering</option>
<option value="English Language & Literature">English Language & Literature</option>
<option value="Foreign Language & Literature">Foreign Language & Literature</option>
<option value="Health Professions & Clinical Sciences">Health Professions & Clinical Sciences</option>
<option value="History">History</option>
<option value="Mathematics">Mathematics</option>
<option value="Natural Resources & Conservation">Natural Resources & Conservation</option>
<option value="Parks, Recreation & Fitness">Parks, Recreation & Fitness</option>
<option value="Philosophy & Religion">Philosophy & Religion</option>
<option value="Physical Sciences">Physical Sciences</option>
<option value="Psychology">Psychology</option>
<option value="Social Sciences">Social Sciences</option>
</select>
 <?php
	      if(isset($_POST['update']))
	   {
   $query="update recruiter set industry='$_POST[industry]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />







<b><u>Fullname :</u> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="fullname" value="<?php echo $row_num['fullname'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update recruiter set fullname='$_POST[fullname]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />

<b><u>Password :</u> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="password" name="pass" value="<?php echo $row_num['password'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update recruiter set password='$_POST[pass]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />

<b><u>Website : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>

<input type="text" name="website" value="<?php echo $row_num['website'];  ?>"/>
   <?php
	   if(isset($_POST['update']))
	   {
   $query="update recruiter set website='$_POST[website]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />
<b><u>Address line 1 : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>

<input type="text" name="add1" value="<?php echo $row_num['add1'];  ?>"/>
   <?php
	   if(isset($_POST['update']))
	   {
   $query="update recruiter set add1='$_POST[add1]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />
<b><u>Address line 2:</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="add2" value="<?php echo $row_num['add2'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update recruiter set add2='$_POST[add2]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />
<b><u>City : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="city" value="<?php echo $row_num['city'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update recruiter set city='$_POST[city]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />
<b><u>State : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="state" value="<?php echo $row_num['state'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update recruiter set state='$_POST[state]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />


<b><u>Country:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
<?php
	if(isset($_POST['update']))
	   {
   $query="update recruiter set country='$_POST[country]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />



<b><u>Zipcode : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="code" value="<?php echo $row_num['zipcode'];  ?>" maxlength='5' size='5'/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update recruiter set zipcode='$_POST[code]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br />
<b><u>Contact:</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="con" value="<?php echo $row_num['contact_number'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update student set contact_number='$_POST[con]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
   <br />
   <b><u>Email:</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="email" value="<?php echo $row_num['email'];  ?>"/>
   <?php
	      if(isset($_POST['update']))
	   {
   $query="update recruiter set email='$_POST[email]' where username='$row_num[username]'";
   $result = mysql_query($query);
      	header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/userprofile.php');
	   }
   ?>
<br /><br />
<input type="submit" text="submit" value="update" name="update">
</form>
<?php
}?>

<html>
<body bgcolor='FFFFCC'>
</body>
</html>
</td>

