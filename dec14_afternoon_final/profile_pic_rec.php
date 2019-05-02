 <?php
 session_start();
 mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name']))) 
{
die("You are not logged in.Click <a href='recruiters_login.php'>here to login</a>");
}	

  	 $name=$_SESSION['name'];
//    $company_id=$_SESSION['company_id'];
    if(!file_exists('profilesrec/'))
	mkdir('profilesrec/', 0777);
    $dirfile = 'profilesrec/'.$name.'/';
    if(!file_exists($dirfile))
	mkdir($dirfile, 0777);
	if($_FILES["file"]["error"] > 0 )
	{ 
		$result=$_FILES["file"]["error"];
	} 
	else
	{
	  $upfile = $dirfile.urlencode($_FILES["file"]["name"]);	 
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
                echo "Media file succesfully inserted !";
                echo $upfile;
                chmod($upfile,0777);

 	$update="update recruiter set profile_pic='$upfile' where username='$name'";

      $queryresult = mysql_query($update) or die("Insert new user error:" .mysql_error());
      $result="0";	
	  echo "Yippe !! success";
      header('Location: userprofile.php');
   }	
                        
                               }
                            else
        

                     {
                            $result="7";
                      }
                        
              	                      
        }
}

 ?>