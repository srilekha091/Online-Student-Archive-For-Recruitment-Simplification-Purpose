 <?php
 session_start();
 mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['email'])) && !(isset($_SESSION['name']))) 
{
die("You are not logged in.Click <a href='recruiters_login.php'>here to login</a>");
}	
else
{
    if(isset($_SESSION['email']))
	{
    $name=$_SESSION['email'];
    $sendfrom=$_SESSION['email'].'@clemson.edu';
	}
	else
	{
    $name=$_SESSION['name'];
	$q="select * from recruiter where username='$name'";
	$r=mysql_query($q);
	$s=mysql_fetch_array($r);
    $sendfrom=$s['email'];
	}


	$sendto=$_POST['to'].'@clemson.edu';
	$sub=$_POST['subject'];
 	$body=$_POST['body'];
 	
//    $company_id=$_SESSION['company_id'];
    if(!file_exists('student_attachment/'))
	mkdir('student_attachment/', 0777);
    $dirfile = 'student_attachment/'.$name.'/';
    if(!file_exists($dirfile))
	mkdir($dirfile, 0777);
//	echo $FILES["file"];
	if($_FILES["file"]["error"] > 0 )
	{

		$q="select distinct flag from messages where sendto='$sendto' AND sendfrom='$sendfrom'";
		$r=mysql_query($q);
		$res=mysql_fetch_array($r);
		if(	$res['flag'] == 0)
			$query= "insert into messages values('$sendfrom','$sendto','$body',NOW(),'','','$sub','no',
		'','','0')";
		else
			$query= "insert into messages values('$sendfrom','$sendto','$body',NOW(),'','','$sub','no',
		'','','1')";

		 $result=mysql_query($query);
             if(isset($_SESSION['email']))
			 header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/inbox.php');
			 else
			 header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/recruiter_inbox.php');

			$result=$_FILES["file"]["error"];
	} 
	else
	{
	  $upfile = $dirfile.urlencode($_FILES["file"]["name"]);
	  echo $upfile;	 
	  if(file_exists($upfile))
	  {
		    echo '<b><h2>This file already exists !</b></h2>';
	  		$result="5"; 
	  }
	  else
	  {	  
			if(is_uploaded_file($_FILES["file"]["tmp_name"]))
			{
				if(!move_uploaded_file($_FILES["file"]["tmp_name"],$upfile))
				{
				      echo "Fail";	
                      $result="6";
				}
				else 
				{
                echo "Attachment file succesfully inserted !";
                $email=$name;

        $q="select distinct flag from messages where sendto='$sendto' AND sendfrom='$sendfrom'";
		$r=mysql_query($q);
		$res=mysql_fetch_array($r);
		if(	$res['flag'] == 0)
		$query= "insert into messages values('$sendfrom','$sendto','$body',NOW(),'','$upfile','$sub','no',
		'".$_FILES["file"]["type"]."','".urlencode($_FILES["file"]["name"])."','0')";
		else
        $query= "insert into messages values('$sendfrom','$sendto','$body',NOW(),'','$upfile','$sub','no',
		'".$_FILES["file"]["type"]."','".urlencode($_FILES["file"]["name"])."','1')";
	
		 $result=mysql_query($query);
		 
	  echo "Yippe !! success";
      if(isset($_SESSION['email']))
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/inbox.php');
	  else
      header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/recruiter_inbox.php');
   }	
                        
                               }
                            else
        

                     {
                            $result="7";
                      }
                        
              	                      
        }
}
}
 ?>