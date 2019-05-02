<?php
session_start();
error_reporting(0);
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['admin']))) 
{
	die("You are not logged in. Click <a href='login.php'>here to login</a>");
}
else
{
	if(!isset($_SESSION['admin']))
	{
	echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    echo '<br>';
    echo' <h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo'  <a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo '<a href ="logout.php">Logout</a></h2>';
	echo '</div>';
    echo '<br>';
//	echo 'bit is '.$_SESSION['forums_bit'];
		if($_SESSION['forums_bit'] == 1)
		{
 		 $name=$_SESSION['name'];
    	 $query="select * from recruiter where orgname = '$name'";
		 $res=mysql_query($query);	
         $r=mysql_fetch_array($res);
		 $name=$r['username'];
         $_SESSION['name']=$name;
		}
		else
		{
//			echo 'bit is '.$_SESSION['forums_bit'];
         $name=$_SESSION['name'];
		}
 	$_SESSION['forums_bit']=0;

	}
	if(isset($_SESSION['admin']))
	{
	  echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
      echo '<br>';
	  echo'<h2><a href ="student_contacts_page.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';	
	  echo'<a href ="company_profile_page.php">Company Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';	
	  	echo'<a href ="banned.php">Banned users</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo '<a href ="logout.php">Logout</a></h2>';
	    echo '</div>';
		echo '<br>';
if(isset($_GET['rec']))
		{
	  $ma=$_GET['rec'];
      $queryy="select * from recruiter where email = '$ma'";
	  $resultt=mysql_query($queryy) or die(mysql_error());
	  $rw=mysql_fetch_array($resultt);
      $org=$rw['orgname']; 
	}
     else
		{
      $org=$_SESSION['orgname'];
		}
   	  $query="select * from recruiter where orgname = '$org'";
	  $result=mysql_query($query) or die(mysql_error());
	  $rrow=mysql_fetch_array($result);
  	  $nam=$rrow['username'];
	  
	}
    if(isset($_SESSION['name']))
	{
	$query="select * from recruiter where username = '$name'";
	}
	if(isset($_SESSION['admin']))
	{
	$query="select * from recruiter where username = '$nam'";
	}

	$result=mysql_query($query) or die(mysql_error());
	$row_num=mysql_fetch_array($result);

	$fullname=$row_num["fullname"];		
	$pass=$row_num["password"];
	$ind=$row_num["industry"];
	$org=$row_num["orgname"];
	$industry=$row_num["industry"];
	$website=$row_num["website"];
	$add1=$row_num["add1"];
	$add2=$row_num["add2"];
	$city=$row_num["city"];
	$state=$row_num["state"];
	$country=$row_num["country"];
	$code=$row_num["zipcode"];
	$contact=$row_num["contact_number"];
	$email=$row_num["email"];
	$profile_pic=$row_num['profile_pic'];
	if(!isset($_SESSION['admin']))
	{
	$recrutier_id=$row_num['recruiter_id'];
    $_SESSION['recruiter_id']=$recrutier_id;
	}
	$_SESSION['rec_email']=$email;
	$_SESSION['orgname']=$org;
    
	if($city == '0' || $city == '')
	$city='-';
    if($country == '0' || $country == '')
	$country='-';
   // if($code == '0' || $code == '')
	//$code='-';
    if($contact == '0' || $contact == '')
	$contact='-';
	if($state == '0' || $state == '')
	$state='-';
	if($add1 == '0' || $add1 == '')
    $add1='-';
	if($add2 == '0' || $add2 == '')
    $add2='-';
	if($email == '0' || $email == '')
    $email='-';
	if($website == '0' || $website == '')
    $website='-';
?>

<form method="POST" >
<table border="4" width="1270" height="592">
<tr valign="top">
<td width="300"> 
<?php
	$_SESSION['fullname']=$fullname;
	echo '<img src="'.$profile_pic.'" width =200 height=150><br>';
	if(!isset($_SESSION['admin']))
	{
    $_SESSION['profile_pic']=$profile_pic;
	echo '<a href="change_profile_pic_rec.php">Click here to change Profile pic</a><br><br>';	
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
<?php
}
?>
<td>
<?php
echo '<h2>RECRUITER</h2>';
if(isset($_SESSION['admin']))
{
echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
      $ban=$rrow['ban'];
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
		 $q="update recruiter set ban='1' where orgname = '$org'";
		 $r=mysql_query($q);	
		 $q1="update company set ban='1' where orgname = '$org'";
		 $r1=mysql_query($q1);	  
		 header('Location: userprofile.php');
		}
	   if(isset($_POST['unban']))
	   {
	     $q="update recruiter set ban='0' where orgname = '$org'";
		 $r=mysql_query($q);	  
		 $q1="update company set ban='0' where orgname = '$org'";
		 $r1=mysql_query($q1);	  
		 header('Location: userprofile.php');
	    }
}
	echo '<center><h1><u>'.$fullname.'\'s Profile Page</u></h1>';
	echo '<table border=5 height="400"> <tr>';
	echo '<td width="250">Fullname </td><td width="250"> '.$fullname;
	echo '</td></tr>';
	echo '<tr><td width="250">Organization  </td><td width="250">'.$org;
	echo '</td></tr>';	
	echo '<tr><td width="250">Industry  </td><td width="250">'.$industry;
	echo '</td></tr>';	
	echo '<tr><td width="250">Company Website  </td><td width="250">'.$website;
	echo '</td></tr>';
	echo '<tr><td width="250">Address Line 1 </td><td width="250">'.$add1;
	echo '</td></tr>';
	echo '<tr><td width="250">Address Line 2 </td><td width="250">'.$add2;
	echo '</td></tr>';
	echo '<tr><td width="250">City </td><td width="250">'.$city;
	echo '</td></tr>';
	echo '<tr><td width="250">State </td><td width="250">'.$state;
	echo '</td></tr>';
	echo '<tr><td width="250">Country </td><td width="250">'.$country;
	echo '</td></tr>';
	echo '<tr><td width="250">Zipcode </td><td width="250">'.$code;
	echo '</td></tr>';
	echo '<tr><td width="250">Contact # </td><td width="250">'.$contact;
	echo '</td></tr>';
	echo '<tr><td width="250">Email </td><td width="250">'.$email;
	echo '</td></tr>';
	echo '</table>';
	echo '</div>';
	echo '</center>';
	}
?>
</td>
<html>
<body bgcolor='FFFFCC'>
</body>
</html>

