<?php
session_start();
error_reporting(0);
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['admin']))) 
{
die("You are not logged in. Click <a href='login.php'>here to login</a>");
}	

if(!isset($_SESSION['cuid']) && !isset($_SESSION['admin']))
 {
    $forums_bit=1;
	$_SESSION['forums_bit']=1;
	echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    echo '<br>';
    echo' <h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo'  <a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo '<a href ="logout.php">Logout</a></h2>';
	echo '</div>';
    echo '<br>';

  $recid=$_SESSION['recruiter_id'];
  $emaila=$_SESSION['rec_email'];
  $query="select * from recruiter where email='$emaila'";
  $res=mysql_query($query) or die(mysql_error());
  $rows = mysql_fetch_array($res);
  $name=$rows['orgname'];
  $_SESSION['name']=$name;
  $_SESSION['orgname']=$name;
  }

 if(isset($_SESSION['cuid']))
 {
	 echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    	echo '<br>';
	    echo' <h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
       echo'  <a href ="company_selection_page.php">Company Selection      Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo '<a href ="logout.php">Logout</a></h2>';
		echo '</div>';
  $cuid=$_SESSION['cuid'];
  $emaila=$_SESSION['email'];
  $email=$emaila.'@clemson.edu';
  
  $query="select * from student where email='$email'";
  $res=mysql_query($query) or die(mysql_error());
  $rows = mysql_fetch_array($res);
  $name=$rows['fname'];
  $_SESSION['name']=$name;
 }

 if(isset($_SESSION['admin']))
 {
	 echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
   	 echo '<br>';
	 echo' <h2><a href ="student_contacts_page.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
     echo'  <a href ="userprofile.php">Recruiter Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	 echo'  <a href ="company_profile_page.php">Company Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
     echo '<a href ="logout.php">Logout</a></h2>';
	 echo '</div>';
	 echo '<br>';
 }

 ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<body bgcolor='FFFFCC'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Discussion Forums</title>
<link rel="stylesheet" type="text/css" href="css/default.css" />
</head>
<form method='post'>
                    <center> <h1> Discussion Forums Page</h1></center>
                       <h2>Existing Threads</h2>
                   <table border="2" cellspacing="5" cellpadding="1em" width="1000">
						<tr> <td><b> Topic </b></td> <td> <b>Created By</b></td> <td><b> Date/Time</b></td> <td><b> No Of Posts</b> </td> </tr> 
				   
                                <?php 
                                   $orgname=$_SESSION['orgname'];
                                   $q="select * from company where orgname='$orgname'";
								   $r=mysql_query($q);
                                   $result_ro = mysql_fetch_array($r);
                                   $company_id=$result_ro['company_id'];
								   $_SESSION['company_id']=$company_id;	if(!isset($_SESSION['cuid'])) 
								   $_SESSION['name']=$orgname;
								   echo '<br>';								
                                  $querya = "SELECT forum_topic,username,t_timestamp,count(forum_topic) FROM forums where company_id='$company_id'group by forum_topic";
                                  $resulta = mysql_query($querya);
                                  while($result_rowa = mysql_fetch_row($resulta))
                                 {
                                  ?><ul>
                                        <tr><td><?php if(isset($_SESSION['recruiter_id']) || isset($_SESSION['admin']))
									 {?> <input type ="checkbox" name="name[]" value="<?php echo $result_rowa[0]; ?>" /> <?php 
									  }
										?><a href="discussion.php?did=<?php echo $result_rowa[0];?>"> <?php echo $result_rowa[0];?></a></td>                                                                         <td> <?php                                
											echo $result_rowa[1];
									 	         ?> </td> <td> <?php echo $result_rowa[2];?> </td> 
											<td> <?php echo $result_rowa[3];?> </td>	</tr>
                                        <?php
                                } 
								   $checked=$_POST['name'];
								   ?>
								
                                </ul>
                        </table>
						<?php if(isset($_SESSION['recruiter_id']) || isset($_SESSION['admin']))
						{
					     echo '<br>';
						 echo '<input type="submit" name="delete" value="Delete Threads" />';
						}?>
</form>
<?php
if(!isset($_SESSION['admin']))
{
?>
                       <h2> Create New Thread</h2>            
			<table border="0" cellspacing="0" cellpadding="1em">
			  <tr>
			    <td>
				<form method="post" action="discussion.php" enctype="multipart/form-data" >
				<tr><td>Thread Name</td><td><input type="text" name="topic"></td></tr>	
				<tr><td>Post</td><td><textarea name="diss" cols="50" rows="5"></textarea></td></tr>
				<tr><td><input type="submit" name="post_disc" value="Create Forum"></td></tr>
				</form>
			   </td>				   
			</table>
			<?php
}
?>
</body>
</html>

<?php
if(isset($_POST['delete']))
{
 foreach($checked as $check)
 { 
   $k=$check;
   $q="delete from forums where forum_topic='$k' AND company_id='$company_id'";
   $r=mysql_query($q);
 }
header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/forums.php');
}
?>