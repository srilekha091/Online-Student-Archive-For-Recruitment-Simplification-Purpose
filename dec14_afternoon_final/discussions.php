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
  echo " In recruiter";
  $recid=$_SESSION['recruiter_id'];
  $emaila=$_SESSION['rec_email'];
  $emaila=$emaila.'@clemson.edu';
  $query="select * from recruiter where recruiter_id='$recid'";
  $res=mysql_query($query) or die(mysql_error());
  $rows = mysql_fetch_array($res);
  $name=$rows['orgname'];
  }

 else
 {
  echo " In Student";
  $cuid=$_SESSION['cuid'];
  $emaila=$_SESSION['email'];
  $email=$emaila.'@clemson.edu'; 
  $query="select * from student where email='$email'";
  $res=mysql_query($query) or die(mysql_error());
  $rows = mysql_fetch_array($res);
  $name=$rows['fname'];
 }

 $_SESSION['name']=$name; 
$did = $_SESSION['did'];

echo $did; 

$topic=$did;
//echo $media_id;

if(isset($_POST['post_comm']))
{
	$diss = $_REQUEST['comments'];
	//echo $comment;
    

	
	 $query="insert into forums(company_id,message,t_timestamp,username,forum_id,forum_topic,level) values($company_id,'$diss',NOW(),'$name','','$topic',1)";
	// $query="INSERT INTO forums (forumid,topic,content,forumaccountuserid,forumpostedtime,username) VALUES ('','$topic','$diss','$accid',NOW(),'$username')";
     $result = mysql_query($query);
	$que="select forum_id from forums order by forum_id desc LIMIT 1";
	$res=mysql_query($que);
	$row=mysql_fetch_array($res);
	$x=$row['forum_id'];
	$qu="update forums set reply_id=$x where forum_id=$x";
	$re=mysql_query($qu);
	
	
	
	if($result)
		{
                    // $_SERVER['HTTP_REFERER']; 
               // $url="media.php?id='".$media_id."'";          
		//header('Location:".$url."');	

		}
}
?> 

<meta http-equiv="refresh" content="0;url=discussion.php?did=<?php echo $did;?>">




