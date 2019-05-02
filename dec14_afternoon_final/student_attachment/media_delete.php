<?php
session_start();
error_reporting(0);
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');

if(!(isset($_SESSION['name']))) 
{
die("You are not logged in.Click <a href='recruiters_login.php'>here to login</a>");
}	

$orgname=$_SESSION['orgname'];
$name=$_SESSION['name'];
$query="select * from company where orgname='$orgname'";
$res=mysql_query($query) or die(mysql_error());
$rows = mysql_fetch_array($res);
$cmp_title=$rows['title'];
$cmp_desc=$rows['description'];
$cmp_id=$rows['company_id'];
?>

<html>
<form method="post" >
<table border="7">
	<tr>
		<b><td width=250><center>File Name</center></td></b>
		<b><td width=400><center>File Size</center></td></b>
		<b><td width=250><center>Date Uploaded</center></td></b>
	</tr>

<?php 
	$query="select * from media where company_id='$cmp_id'";
	$res=mysql_query($query) or die(mysql_error());
	while($rows = mysql_fetch_array($res))
	{?>
		<tr>
		<td><input type="checkbox" name="name[]" value="<?php echo $rows['media_id']; ?>"><?php echo $rows['media_title'] ?></td>
		<td><?php echo $rows['media_size']; ?></td> 
		<td><?php echo $rows['uploaddate'];?></td>
		</tr>
<?php
	}
   $checked=$_POST['name'];
?>
</table>
<br><br>
<input type="submit" name="delete" value="delete">
</form>
</html>

<?php
if(isset($_POST['delete']))
{
foreach($checked as $check)
{
  $k=$check;
  $q="select * from media where media_id='$k'";
  $r=mysql_query($q) or die(mysql_error());
  $query="delete from media where (company_id='$cmp_id' AND media_id='$k')";
  $res=mysql_query($query) or die(mysql_error());
  echo $res;
  $path='/home/f09t10/public_html/Project/Milestone1/uploads/'.$name.'/'.$res['media_title'];
  chmod("$path",0777);
  unlink("$path");		
//header('Location:http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/company_profile_page.php');
}
}?>




