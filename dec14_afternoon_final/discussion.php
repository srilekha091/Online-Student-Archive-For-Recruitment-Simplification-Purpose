<?php
error_reporting(0);
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['admin']))) 
{
die("You are not logged in. Click <a href='login.php'>here to login</a>");
}	

$company_id=$_SESSION['company_id'];

if(!isset($_SESSION['cuid']) && !isset($_SESSION['admin']))
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

if(isset($_SESSION['cuid']))
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


   if(isset($_POST['post_disc']))
	{
		$topic = $_POST['topic'];
		$_SESSION['topic']=$topic;
		$diss = $_POST['diss'];
		$query="insert into forums(company_id,message,t_timestamp,username,forum_id,forum_topic,level) values($company_id,'$diss',NOW(),'$name','','$topic',1)";

		//$query="INSERT INTO forums (forumid,topic,content,forumaccountuserid,forumpostedtime,username) VALUES ('','$topic','$diss','$accid',NOW(),'$username')";
		$result = mysql_query($query);
	
	$que="select forum_id from forums order by forum_id desc LIMIT 1";
	$res=mysql_query($que);
	$row=mysql_fetch_array($res);
	$x=$row['forum_id'];
	$qu="update forums set reply_id=$x where forum_id=$x";
	$re=mysql_query($qu);
	
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
$_SESSION['did']=$did;
?>

<h2> Thread Name: <?php echo $did;?> </h2>	
				
				<?php
			
/*				  $querya = "SELECT * FROM forums where forum_topic='$did' AND company_id='$company_id' order by t_timestamp asc";
                  $resulta = mysql_query($querya);
                            ?>     
                              <?php  
				  while($result_rowa = mysql_fetch_row($resulta))
				 {  
				  ?>		
				    									          

					<b>Post:</b><?php echo $result_rowa[1]; ?>
					
					<br>		
				<b>Posted By:</b>	<?php echo $result_rowa[3];?><br><b>Posted At:</b><?php echo $result_rowa[2]; ?>
						<form action="reply.php?id=">
							<input type="submit" name="<?php echo $result_rowa[4]; ?>" value="Reply">
						</form>
						
						<form action="deletions.php?id=".<?php echo $result_rowa[4]; ?>>
						<?php if((isset($_SESSION['recruiter_id'])) || $_SESSION['name']==$result_rowa[3] || (isset($_SESSION['admin'])))
									 {?><input type="submit" name="<?php echo $result_rowa[4]; ?>" value="Delete"><?php } ?>
						</form>
						
				
				<br>
                                        <?php
										$temp=$result_rowa[5];
										$_SESSION['did']=$temp;
										
					echo '--------------------------------------------------------------------------------';
					echo '<br>';
				} 
//					 $checked=$_POST['name'];	
*/					 ?>					 


			<br /><br /><table>
<?php
				$querya = "SELECT * FROM forums where forum_topic='$did' AND company_id='$company_id' AND reply_id=forum_id AND level=1 order by t_timestamp asc";
                  $resulta = mysql_query($querya);
                  while($result_rowa = mysql_fetch_row($resulta))
				 {  
				 		
				 		$l=$result_rowa[4];					 
						echo '<table align="left" border="0" width="500">';
						echo '<tr align="left">';
						echo '<td><b>Post:</b>'. $result_rowa[1].'</td>';
						echo '</tr><tr>';
						echo '<td><b>Posted By:</b>'. $result_rowa[3].'</td>';
						echo '</tr><tr>';
						echo '<td><b>Posted At:</b>'. $result_rowa[2].'</td>';
						echo '</tr></table>'; ?>
						<br><br><br><br>
						<table width="30"><tr><td><form action="reply.php?id=">
							<input type="submit" name="<?php echo $result_rowa[4]; ?>" value="Reply">
						</form></td>
						
						<td><form action="deletions.php?id=".<?php echo $result_rowa[4]; ?>>
						<?php if((isset($_SESSION['recruiter_id'])) || $_SESSION['name']==$result_rowa[3] || (isset($_SESSION['admin'])))
									 {?><input type="submit" name="<?php echo $result_rowa[4]; ?>" value="Delete"><?php } ?>
						</form></td>
						</tr></table>
				<?php		$queryb = "SELECT * FROM forums where forum_topic='$did' AND company_id='$company_id' AND reply_id=$l AND level=2 order by t_timestamp asc";
                  $resultb = mysql_query($queryb);
					while($result_rowb = mysql_fetch_row($resultb))
				 {  
				 		$m=$result_rowb[4];				 
						echo '<table align="left" border="0" width="500">';
						echo '<tr align="left">';
						echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|<b>Re:'.$result_rowa[1].'</b></td>';
						echo '</tr><tr>';
						echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|<b>Post:</b>'. $result_rowb[1].'</td>';
						echo '</tr><tr>';
						echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|<b>Posted By:</b>'. $result_rowb[3].'</td>';
						echo '</tr><tr>';
						echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|<b>Posted At:</b>'. $result_rowb[2].'</td>';
						echo '</tr></table>'; ?>
						<br><br><br><br><br> 
						<table width="100"><tr><td><form action="reply.php?id=">
							<input type="submit" name="<?php echo $result_rowb[4]; ?>" value="Reply">
						</form></td>
						
						<td><form action="deletions.php?id=".<?php echo $result_rowb[4]; ?>>
						<?php if((isset($_SESSION['recruiter_id'])) || $_SESSION['name']==$result_rowb[3] || (isset($_SESSION['admin'])))
									 {?><input type="submit" name="<?php echo $result_rowb[4]; ?>" value="Delete"><?php } ?>
						</form></td>
						</tr></table>
						
			  <?php		$queryc = "SELECT * FROM forums where forum_topic='$did' AND company_id='$company_id' AND reply_id=$m AND level=3 order by t_timestamp asc";
                  $resultc = mysql_query($queryc);
					while($result_rowc = mysql_fetch_row($resultc))
				 {  
				 						 
						echo '<table align="left" border="0" width="500">';
						echo '<tr align="left">';
						echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|<b>Re:'.$result_rowb[1].'</b></td>';
						echo '</tr><tr>';
						echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|<b>Post:</b>'. $result_rowc[1].'</td>';
						echo '</tr><tr>';
						echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|<b>Posted By:</b>'. $result_rowc[3].'</td>';
						echo '</tr><tr>';
						echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|<b>Posted At:</b>'. $result_rowc[2].'</td>';
						echo '</tr></table>'; ?>
						<br><br><br><br><br>
						<table width="100"><tr>
						<td><form action="deletions.php?id=".<?php echo $result_rowc[4]; ?>>
						<?php if((isset($_SESSION['recruiter_id'])) || $_SESSION['name']==$result_rowc[3] || (isset($_SESSION['admin'])))
									 {?><input type="submit" name="<?php echo $result_rowc[4]; ?>" value="Delete"><?php } ?>
						</form></td>
						</tr></table> 		

<?php			
				}
				} 
				
				}
?>
</table>
<br><p></p><p></p><p></p><p></p><br><br><br>
<?php

	if(!isset($_SESSION['admin']))
	{
						 ?>

                     <table>
	<h4>Add your comment to the discussion on this thread:</h4>
														
						<form method=post action=discussions.php enctype=multipart/form-data >												
						<td><textarea name=comments cols=50 rows=5></textarea></td>						 
						<td><input type=submit name=post_comm value=Post comment></td>
						</form>


                
                   </table>


			
<?php			
	}			 
} ?>

<h2><a href="forums.php">Click here to go back to forums page</a></h2>
</body>
</html>

<?php
/*if(isset($_POST['delete']))
{
 $username=$_SESSION['name'];
 foreach($checked as $check)
 { 
   $k=$check;
   if(isset($_SESSION['recruiter_id']) || isset($_SESSION['admin']))
	 {
   $q="delete from forums where message='$k'";
	 }
   else
	 {
   $q="delete from forums where message='$k' AND username='$username'";
	 }
   $r=mysql_query($q);
 }
header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/discussion.php?did='.$did);

}
*/
?>