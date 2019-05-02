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
	    $uname=$_POST['uname'];       
        $pass=$_POST['pass'];
	   $queryy="select * from recruiter where username='$uname'";
       $resultt=mysql_query($queryy) or die(mysql_error());
       $row_num=mysql_fetch_row($resultt);
	   if($row_num[18] == 0)
	 {
	   if($row_num[1] == $pass)
		{
	       	           if($row_num[14] == 'active')
			{
			   $_SESSION['name']=$_POST['uname'];
              header('Location: userprofile.php');			
			}
		}
	 }
  }

?>


<html>
<body>
<form method="post">
<u><b><center><h1>RECRUITERS LOGIN PAGE</h1></center></b></u>
<b><u>
username:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="uname" value=""/>
<br /><br />


<b><u>password:</u></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="password" name="pass" value="" />
<br /><br />

<input type="submit" text="submit" value='login' name='login'>
</form>
</body>
</html>