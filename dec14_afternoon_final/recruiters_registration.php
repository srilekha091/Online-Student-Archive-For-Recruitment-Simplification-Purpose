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
<b><h2><u><center>Recruiter Registration Form</center></h2></u></b>


<?php
session_start();
error_reporting(0);
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(isset($_POST['register']))
{
$industry=$_POST['industry'];
$_SESSION['industry']=$industry;
$oname=$_POST['oname'];
$_SESSION['oname']=$oname;
$website=$_POST['website'];
$_SESSION['website']=$website;
$uname=$_POST['uname'];
$_SESSION['uname']=$uname;
$pass=$_POST['pass'];
$_SESSION['pass']=$pass;
$address1=$_POST['address1'];
$_SESSION['address1']=$address1;
$address2=$_POST['address2'];
$_SESSION['address2']=$address2;
$city=$_POST['city'];
$_SESSION['city']=$city;
$state=$_POST['state'];
$_SESSION['state']=$state;
$fullname=$_POST['fullname'];
$_SESSION['fullname']=$fullname;
$country=$_POST['country'];
$_SESSION['country']=$country;
$code=$_POST['code'];
$_SESSION['code']=$code;
$contact=$_POST['contact'];
$_SESSION['contact']=$contact;
$email=$_POST['cmid'].'@clemson.edu';
$_SESSION['email']=$email;
$cmid=$_POST['cmid'];
$_SESSION['cmid']=$cmid;
if($oname == '')
{
$flag=1;
echo '<br /><br />';
echo '<h3>Cannot proceed with the registration as the Organization name cannot be empty!</h3>';
echo '<br /><br />';
echo '<a href="recruiters_registration.php">Take me back to recruiter registration screen</a>';
echo '<br /><br />';
}
elseif($uname == '')
{
$flag=1;
echo '<br /><br />';
echo '<h3>Cannot proceed with the registration as the username field cannot be empty!</h3>';
echo '<br /><br />';
echo '<a href="recruiters_registration.php">Take me back to recruiter registration screen</a>';
echo '<br /><br />';
}
elseif($pass == '')
{
$flag=1;
echo '<br /><br />';
echo '<h3>Cannot proceed with the registration as the password field cannot be null !</h3>';
echo '<br /><br />';
echo '<a href="recruiters_registration.php">Take me back to recruiter registration screen</a>';
echo '<br /><br />';
}
else
{
$queryy="select * from recruiter where username='$uname'";
$resultt=mysql_query($queryy) or die(mysql_error());
$row_num=mysql_fetch_row($resultt);
if($row_num[0] != NULL)
 {
  $flag=1;
  echo '<br /><h3>Account with the same username already exists !</h3><br /><br />';
  echo '<br /><br />';
  echo '<a href="recruiters_registration.php">Take me back to recruiter registration screen</a>';
  echo '<br /><br />';
  exit;
 }
$query="select * from recruiter where  orgname='$oname'";
$result=mysql_query($query) or die(mysql_error());
$row_num=mysql_fetch_row($result);

if($row_num[3] != NULL)
 {
  $flag=1;
  echo '<br /><h3>Account with the same organization name already exists !</h3><br /><br />';
  echo '<br /><br />';
  echo '<a href="recruiters_registration.php">Take me back to recruiter registration screen</a>';
  echo '<br /><br />';
 }

$query1="select * from recruiter where  email='$email'";
$result1=mysql_query($query1) or die(mysql_error());
$row_num=mysql_fetch_row($result1);
echo '<br /><br />';
echo '<br /><br />';
if($row_num[15] != NULL)
 {
  $flag=1;
  echo '<br /><h3>Account with the same e-mail already exists !</h3><br /><br />';
  echo '<br /><br />';
  echo '<a href="recruiters_registration.php">Take me back to recruiter registration screen</a>';
  echo '<br /><br />';
 }
 
else
	{	
		$flag=1;
     	$activation_key=mt_rand();
		$to      = $email;
        $subject = " Recruiters Registration Confirmation E-Mail";
        $message = "Welcome to our website!\r\rYou have completed registration with our system using this e-mail id. However, you are just one step away from accessing our system. Please complete your registration by clicking the following link:\rhttp://pba.cs.clemson.edu/~f09t10/Project/Milestone1/recruiter_registration_confirmation.php?$activation_key\r\r
		If you received this e-mail by mistake, please ignore it and you will be removed from our mailing list.\r\rRegards,\r\r Clemson E-Shelf Team";
		$headers = 'From: systemadmin@unknown.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
      mail($to, $subject, $message, $headers);
	 $query="INSERT INTO recruiter VALUES ('$uname','$pass','$industry','$oname','$website','$address1','$address2','$city','$state','$country','$code','$contact','','$activation_key','inactive','$email','profiles/default_profile.jpg','$fullname','0')";
     $result=mysql_query($query);
	 list($month, $day) = split('[ ]',$fullname);
     $query1="insert into registered_users values ('','$email','$month','$day')";
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
<td width='600'>
<b><u>Industry:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
<br /><br />


<b>*<u>Organization's Name : </u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>
<input type="text" name="oname" value="<?php if(isset($_SESSION['oname'])){ echo $_SESSION['oname'];} ?>"/>
<br /><br />

<b><u>Organization's Website:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="website" value="<?php if(isset($_SESSION['website'])){ echo $_SESSION['website'];} ?>"/>
<br /><br />

<b>*<u>username:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="uname" value="<?php if(isset($_SESSION['uname'])){ echo $_SESSION['uname'];} ?>"/>
<br /><br />

<b>*<u>password:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="password" name="pass" value="<?php if(isset($_SESSION['pass'])){ echo $_SESSION['pass'];} ?>"/>
<br /><br />

<b>*<u>email:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="cmid" value="<?php if(isset($_SESSION['cmid'])){ echo $_SESSION['cmid'];} ?>" size='6' maxlength='7'/>@clemson.edu
<br /><br />
<b>*<u>Org. fullname:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="fullname" value="<?php if(isset($_SESSION['cmid'])){ echo $_SESSION['fullname'];} ?>"/> (xxx yyy)


</td>
<td>
<b><u><h3>Company Details:</h3></b></u><br />
<b><u>Address Line 1:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="address1" value="<?php if(isset($_SESSION['address1'])){ echo $_SESSION['address1'];} ?>"/>
<br /><br />

<b><u>Address Line 2:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
<input type="text" name="code" value="<?php if(isset($_SESSION['code'])){ echo $_SESSION['code'];} ?>"  maxlength='5' size='5'/>
<br /><br />

<b><u>Contact#:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="contact" value="<?php if(isset($_SESSION['contact'])){ echo $_SESSION['contact'];} ?>"size='10' maxlength='10'/>
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