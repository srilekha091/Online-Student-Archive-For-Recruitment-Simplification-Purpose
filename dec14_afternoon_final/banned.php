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
echo '<h1>Banned students</h1>';
echo '<table border=7>';
echo '<tr>';
echo '<td width=100><center><b>First Name</b></center></td>';
echo '<td width=100><center><b>Last Name</b></center></td>';
echo '<td width=100><center><b>Department</b></center></td>';
echo '<td width=170><center><b>email</b></center></td>';
echo '<td width=100><center><b>Contact#</b></center></td>';
echo '</tr>';
$query="select * from student where ban='1'";
$result = mysql_query($query) or die(mysql_error());
while($row_num = mysql_fetch_array($result))
	{ 
	 $key = preg_split("/[@]+/",$row_num['email']);
	   $disp=$key[0];
	?>
  <tr>
  <td>       <center>       <?php echo $row_num['fname']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['lname']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['major']; ?> </center></td>
  <td>       <center> <a href ="studentprofile.php?student=<?php echo $disp; ?>"><?php echo $row_num['email']; ?></a> </center></td>  
  <td>       <center>       <?php echo $row_num['contact']; ?> </center></td>
  </tr>
<?php
} ?>
</table>
<?php
echo '<br><br><br>';
echo '<h1>Banned Recruiters</h1>';
echo '<table border=7>';
echo '<tr>';
echo '<td width=100><center><b>username</b></center></td>';
echo '<td width=100><center><b>Organization name</b></center></td>';
echo '<td width=100><center><b>Industry</b></center></td>';
echo '<td width=170><center><b>email</b></center></td>';
echo '<td width=100><center><b>Contact#</b></center></td>';
echo '</tr>';
$query="select * from recruiter where ban='1'";
$result = mysql_query($query) or die(mysql_error());
while($row_num = mysql_fetch_array($result))
	{ 
    $disp=substr($row_num['email'],0,7);
	$_SESSION['orgname']=$row_num['orgname'];
	if($row_num['contact_number'] == '' || $row_num['contact_number'] == '0' || $row_num['contact_number'] == 'NULL' )
		{
         $row_num['contact_number'] = 'Not Available';
		}
//		?student=<?php echo $disp; ?>
	
  <tr>
  <td>       <center>       <?php echo $row_num['username']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['orgname']; ?> </center></td>
  <td>       <center>       <?php echo $row_num['industry']; ?> </center></td>
  <td>       <center> <a href = "userprofile.php?rec=<?php echo $row_num['email']; ?>"><?php echo $row_num['email']; ?></a> </center></td>  
  <td>       <center>       <?php echo $row_num['contact_number']; ?> </center></td>
  </tr>
<?php
} ?>
</table>
<?php
} 
?>

<html>
<body bgcolor='FFFFCC'>
</body>
</html>
