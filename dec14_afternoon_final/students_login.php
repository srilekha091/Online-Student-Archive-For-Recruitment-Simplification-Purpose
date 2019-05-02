<html>
<body bgcolor='FFFFCC'> 
<div style="background-color:#FF9912;width:1300px;height:100px">
<br />
<h2><a href ="homepage.php">Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="registration.php">Registration Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="login.php">Login Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href ="overview.pdf">System Overview Page</a></h2>
</div>
<br><br>
 </BODY>
<br />
<?php
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(isset($_POST['login']))
{ 
	    $email=$_POST['cmid'];
		$mai=$_POST['cmid'].'@clemson.edu';
        $pwd=$_POST['pwd'];	
	if(strlen($pwd) == '')
	{
 //   	echo 'Password field cannot be empty !';
	}

	else
	{
	   $queryy="select * from student where email = '$mai'";
       $resultt=mysql_query($queryy) or die(mysql_error());
       $row_num=mysql_fetch_row($resultt);	   	
	   if($row_num[19] == 0)
		{       
		 	 if($row_num[4] == $pwd)
			{		
	           if($row_num[15] == 'active')
				{
			     $_SESSION['email']=$_POST['cmid'];
           	     $_SESSION['cuid']=$row_num[2];
                 header('Location: studentprofile.php');
				}
			}		
		}
    }

}
?>


<html>
<body>
<form method="post">
<u><b><center><h1>STUDENTS LOGIN PAGE</h1></center></b></u>

<b><u>
clemson id:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="cmid" size='6' maxlength='7'/>@clemson.edu
<br /><br />


<b><u>password:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="password" name="pwd" />
<br /><br />
<input type="submit" text="submit" value='login' name='login'> 
</form>
</body>
</html>