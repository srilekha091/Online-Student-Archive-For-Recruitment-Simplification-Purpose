<?php
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email']))) 
{
die("You are not logged in. Click <a href='login.php'>here to login</a>");
}	

$company_id=$_SESSION['company_id'];

if(!isset($_SESSION['cuid']))
 {
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
  $emaila=$emaila.'@clemson.edu';
  $query="select * from recruiter where email='$emaila'";
  $res=mysql_query($query) or die(mysql_error());
  $rows = mysql_fetch_array($res);
  $name=$_SESSION['name'];
  }

 else
 {
  echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    	echo '<br>';
	    echo' <h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
       echo'  <a href ="company_selection_page.php">Company Selection      Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo '<a href ="logout.php">Logout</a></h2>';
		echo '</div>';
  $company_id=$_SESSION['company_id'];
  $cuid=$_SESSION['cuid'];
  $emaila=$_SESSION['email'];
  $email=$emaila.'@clemson.edu';
  $query="select * from student where email='$email'";
  $res=mysql_query($query) or die(mysql_error());
  $rows = mysql_fetch_array($res);
  $name=$rows['fname'];
  $_SESSION['name']=$name;
 }
  
   if(isset($_POST['post_disc']))
	{
		$topic = $_POST['topic'];
		$_SESSION['topic']=$topic;
		$diss = $_POST['diss'];
		$query="insert into forums(company_id,message,t_timestamp,username,forum_id,forum_topic) values($company_id,'$diss',NOW(),'$name','','$topic')";

		//$query="INSERT INTO forums (forumid,topic,content,forumaccountuserid,forumpostedtime,username) VALUES ('','$topic','$diss','$accid',NOW(),'$username')";
		$result = mysql_query($query);
	
		if($result)	  
       header('Location:forums.php');
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	
	
</head>



<body bgcolor='FFFFCC'>



<?php             
if(isset($_GET['did']))
{
$_SESSION['name']=$name;
$did=$_GET['did'];
?>

<h2> Forum Name: <?php echo $did;?> </h2>
			
			<table border width="80%" cellspacing="5" cellpadding="1em">
				
				<?php
			
				  $querya = "SELECT * FROM forums where forum_topic='$did' AND company_id='$company_id'";
				  $resulta = mysql_query($querya);
                            ?>      <tr><td><b>Topic:</b></td><td><b><?php echo $did;?></b></td></tr>  
                              <?php  
				  while($result_rowa = mysql_fetch_row($resulta))
				 {  
				  ?>																	
					<tr><td>Post:</td><td><?php echo $result_rowa[1]; ?></td></tr>		
					<tr><td>Posted by:</td><td><a href="personalized.php?uname=<?php echo $result_rowa[3]; ?>"><?php echo $result_rowa[3];?> </a></td></tr>	
			   		<tr><td>Posted at:</td><td><?php echo $result_rowa[2]; ?></td>
					<td> </td></tr>
                                        <?php
										$temp=$result_rowa[5];
										$_SESSION['did']=$temp;
				} ?>
						
			</table>

                     <table>
	Add your comment to the discussion on this thread:
														
						<form method=post action=discussions.php enctype=multipart/form-data >												
						<td><textarea name=comments cols=50 rows=5></textarea></td>						 
						<td><input type=submit name=post_comm value=Post comment></td>
						</form>


                
                   </table>


			
<?php			
			 
} ?>

<h2><a href="forums.php">Click here to go back to forums page</a></h2>
</body>
</html>
