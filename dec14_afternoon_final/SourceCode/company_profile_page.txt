<?php
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['admin']))) 
{
die("You are not logged in. Click <a href='login.php'>here to login</a>");
}	

$orgname=$_SESSION['orgname'];
$query="select * from company where orgname='$orgname'";
$res=mysql_query($query) or die(mysql_error());
$rows = mysql_fetch_array($res);
$cmp_title=$rows['title'];
$cmp_desc=$rows['description'];
$cmp_id=$rows['company_id'];
echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
echo '<br>';
    if((isset($_SESSION['email']))) 
	{
	echo' <h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
 	if((isset($_SESSION['name'])) && (isset($_SESSION['recruiter_id']))) 
	{
	echo' <h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
	if((isset($_SESSION['admin']))) 
	{
	echo' <h2><a href ="student_contacts_page.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		echo'  <a href ="userprofile.php">Recruiter Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
	if(!(isset($_SESSION['admin'])))
	{
    echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
    if((isset($_SESSION['email']))) 
	{
    echo'<a href ="company_selection_page.php">Company Selection Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
    if((isset($_SESSION['name'])) && (isset($_SESSION['recruiter_id']))) 
	{
    echo'  <a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
	}
    echo '<a href ="logout.php">Logout</a></h2>';
echo '</div>';



echo '<b><u><h2><center>';
echo 'Welcome to '.$orgname;
echo '<center></h2></u></b>';
echo '<h2 align="right"><h2 align="right"><a href="calendar_rec.php">Calendar </a>&nbsp&nbsp&nbsp;<a href="forums.php">Discussion Forums </a></h2>';
echo '<b><h3>';
echo $cmp_desc;
echo '</b></h3>';
echo '<h1><b> Events:-</b></h1>';
echo '<table border=7>';
echo '<tr>';
echo '<b><td width=300><center><b><div style="background-color:#FF9912;width:300px;height:20px">Event Title</div></center></td></b>';
echo '<b><td width=650><center><b><center><b><div style="background-color:#FF9912;width:650px;height:20px">Event Description</div></center></td></b>';
echo '<b><td width=250><center><b><center><b><div style="background-color:#FF9912;width:250px;height:20px">Date Posted(YYYY-MM-DD)</div></center></td></b>';
echo '</tr>';
	$query="select * from event where company_id='$cmp_id'";
    $result = mysql_query($query) or die(mysql_error());
    while($row_num = mysql_fetch_array($result))
	{?>
	
		<tr>

  <td>             <center> <?php echo $row_num['event_title']; ?></center></td>
  <td>             <center> <?php echo $row_num['event_desc']; ?></center> </td>
  <td>             <center><?php echo $row_num['dateposted']; ?> </center></td>
    	</tr>
<?php	}?>

	</table>


<?php
echo '<br><br><br>';

echo '<h1><b>Files:-</b></h3>';
echo '<table border=7>';
echo '<tr>';
echo '<b><td width=650><center><b><div style="background-color:#FF9912;width:650px;height:20px">Media Title</div></b></center></td></b>';
echo '<b><td width=250><center><b><div style="background-color:#FF9912;width:250px;height:20px">Media Size(KB)</div></b></center></td></b>';
echo '<b><td width=300><center><b><div style="background-color:#FF9912;width:300px;height:20px">Date Posted(YYYY-MM-DD)</div></b></center></td></b>';
echo '</tr>';
	$query="select * from media where (company_id='$cmp_id' AND (media_type LIKE '%audio%' OR media_type LIKE '%video%' OR media_type LIKE '%image%' OR media_type LIKE '%application%'))";
    $result = mysql_query($query) or die(mysql_error());
    while($row_num = mysql_fetch_array($result))
	{
	
 				$filename=$row_num['media_title'];
				$filepath=$row_num['media_path'];
				$type=$row_num['media_type'];
				$mediaid=$row_num['media_id'];
	?>
	
		<tr>
  <td> <center><a href="<?php echo $filepath.$filename ?>"><?php echo $filename ?></a></center></td>
  <td>            <center>  <?php echo $row_num['media_size']/1000; ?></center> </td>
  <td><center>              <?php echo $row_num['uploaddate']; ?> </center></td>
    	</tr>
<?php	}?>

	</table>
<html>
<body bgcolor='FFFFCC'>
</body>
</html>

<!--
<?php
echo '<br><br><br>';

echo '<h3> Photos related to Company</h3>';
echo '<table border=7>';
echo '<tr>';
echo '<b><td width=250><center>Photo Title</center></td></b>';
echo '<b><td width=650><center>Photo Size</center></td></b>';
echo '<b><td width=50><center>Date Posted</center></td></b>';
echo '</tr>';
	$query="select * from media where (company_id='$cmp_id' AND (media_type LIKE '%image%'))";
    $result = mysql_query($query) or die(mysql_error());
    while($row_num = mysql_fetch_array($result))
	{
	
 				$filename=$row_num['media_title'];
				$filepath=$row_num['media_path'];
				$type=$row_num['media_type'];
				$mediaid=$row_num['media_id'];
	?>
		<tr>
  <td>              <a href="<?php echo $filepath.$filename ?>"><?php echo $filename ?></a></td>
  <td>              <?php echo $row_num['media_size']; ?> </td>
  <td>              <?php echo $row_num['uploaddate']; ?> </td>
    	</tr>
<?php	}?>

	</table>


<?php
echo '<br><br><br>';

echo '<h3> Word Documents</h3>';
echo '<table border=7>';
echo '<tr>';
echo '<b><td width=250><center>Document Title</center></td></b>';
echo '<b><td width=650><center>Document Size</center></td></b>';
echo '<b><td width=50><center>Date Posted</center></td></b>';
echo '</tr>';
	$query="select * from media where (company_id='$cmp_id' AND (media_type LIKE '%application%'))";
    $result = mysql_query($query) or die(mysql_error());
    while($row_num = mysql_fetch_array($result))
	{
	
 				$filename=$row_num['media_title'];
				$filepath=$row_num['media_path'];
				$type=$row_num['media_type'];
				$mediaid=$row_num['media_id'];
	?>
		<tr>
  <td>              <a href="<?php echo $filepath.$filename ?>"><?php echo $filename ?></a></td>
  <td>              <?php echo $row_num['media_size']; ?> </td>
  <td>              <?php echo $row_num['uploaddate']; ?> </td>
    	</tr>
<?php	}?>

	</table>
-->	
	
