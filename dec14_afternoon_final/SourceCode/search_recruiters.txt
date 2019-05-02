<?php
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['admin']))) 
{
die("You are not logged in as system administrator !");
}	
else
{
	    echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
	    echo '<br>';	
		echo'<h2><a href ="student_contacts_page.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		echo'<a href ="banned.php">Banned users</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo '<a href ="logout.php">Logout</a></h2>';
	    echo '</div>';
echo	'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
echo	'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	echo '<a href="student_contacts_page.php"><h1>search by department</a>';
	echo	'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	echo '<a href="student_contacts_page_details.php">search by student details</h1></a>';
if(isset($_POST['submit']))
{
		$_SESSION['orgname']=$_POST['major'];
    	 header('Location: userprofile.php');
}
?>

<html>
<body>
<form method="post"> 
<table border="4" width="1270" height="592">
<tr valign="top">
<td>
<br /><br />
<?php
$query="select * from company";
$res=mysql_query($query);
echo '<h2><b><u>Select a company:</u></b></h2>';
echo '<select name="major">';
while($r = mysql_fetch_array($res))
{
	?>
<option value="<?php echo $r['orgname']; ?>"><?php echo $r['orgname']; ?></option>
<?php } ?>
</select>
<br><br><br>
<input type="submit" text="submit" value='select' name='submit'>
<body bgcolor='FFFFCC'>
</body>
</html>
<?php
	}
?>


