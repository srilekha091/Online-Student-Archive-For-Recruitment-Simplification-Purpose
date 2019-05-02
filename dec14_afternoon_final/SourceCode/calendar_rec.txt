<?php
error_reporting(0);
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');

if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email']))) 
{
die("You are not logged in. Click <a href='login.php'>here to login</a>");
}	

if(!isset($_SESSION['cuid']))
 {
	echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    echo '<br>';
    echo' <h2><a href ="userprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo'  <a href ="company_profiles_page.php">Company Home Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo '<a href ="logout.php">Logout</a></h2>';
	echo '</div>';
    echo '<br>';
  }

 else
 {
	 echo '<div style="background-color:#FF9912;width:1300px;height:100px">';
    	echo '<br>';
	    echo' <h2><a href ="studentprofile.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo'  <a href ="student_contacts_page.php">Student Contacts Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
       echo'  <a href ="company_selection_page.php">Company Selection      Page</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo '<a href ="logout.php">Logout</a></h2>';
		echo '</div>';
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<title>Untitled Document</title>
<script>
function goLastMonth(month, year){
// If the month is January, decrement the year
if(month == 1){
--year;
month = 13;
}
document.location.href = '<?=$_SERVER['PHP_SELF'];?>?month='+(month-1)+'&year='+year;
}
//next function
function goNextMonth(month, year){
// If the month is December, increment the year
if(month == 12){
++year;
month = 0;
}
document.location.href = '<?=$_SERVER['PHP_SELF'];?>?month='+(month+1)+'&year='+year;
} 

function remChars(txtControl, txtCount, intMaxLength)
{
if(txtControl.value.length > intMaxLength)
txtControl.value = txtControl.value.substring(0, (intMaxLength-1));
else
txtCount.value = intMaxLength - txtControl.value.length;
}

function checkFilled() {
var filled = 0
var x = document.form1.calName.value;
//x = x.replace(/^\s+/,""); // strip leading spaces
if (x.length > 0) {filled ++}

var y = document.form1.calDesc.value;
//y = y.replace(/^s+/,""); // strip leading spaces
if (y.length > 0) {filled ++}

if (filled == 2) {
document.getElementById("Submit").disabled = false;
}
else {document.getElementById("Submit").disabled = true} // in case a field is filled then erased

}

</script>
<style>
body{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:12px;
}
.today{
/*background-color:#00CCCC;*/
font-weight:bold;
background-image:url(calBg.jpg);
background-repeat:no-repeat;
background-position:center;
position:relative;
}
.today span{
position:absolute;
left:0;
top:0; 
}

.today a{
color:#000000;
padding-top:10px;
}
.selected {
color: #FFFFFF;
background-color: #C00000;
}
.event {
background-color: #FF9900;
border:1px solid #ffffff;
} 
.normal {
background-color: #FFCC66;
border:1px solid #ffffff;
} 
table{
border:1px solid #cccccc;
padding:3px;
}
th{
width:36px;
background-color:#cccccc;
text-align:center;
color:#ffffff;
border-left:1px solid #ffffff;
}
td{
text-align:center;
padding:10px;
margin:0;
}
table.tableClass{
width:350px;
border:none;
border-collapse: collapse;
font-size:85%;
border:1px dotted #cccccc;
}
table.tableClass input,textarea{
font-size:90%;
}
#form1{
margin:5px 0 0 0;
}
#greyBox{
height:10px;
width:10px;
background-color:#C6D1DC;
border:1px solid #666666;
margin:5px;
}
#legend{
margin:5 0 10px 50px;
width:200px;
}
#hr{border-bottom:1px solid #cccccc;width:300px;}
.output{width:300px;border-bottom:1px dotted #ccc;margin-bottom:5px;padding:6px;}
h5{margin:0;}
</style>
</head>

<body bgcolor='FFFFCC'df>
<?php
$orgname=$_SESSION['orgname'];
echo '<h2 align="right"><a href="company_profile_page.php"> Go back to '.$orgname.'`s Home Page</a></h2><br>';
$email=$_SESSION['email'];
$q="select * from cal_subscription where email='$email' AND orgname='$orgname'";
$r=mysql_query($q);
$rows=mysql_num_rows($r);

if(isset($_SESSION['email']))
{
	echo '<form action="calendar_rec.php" method="post">';
	if($rows == 0)
	{
		echo '<input type="submit" name="subscribe" value="Subscribe to this Calendar" />';
	}
	else
	{
		echo '<input type="submit" name="unsubscribe" value="Unsubscribe from this Calendar" />';
	}
	echo '</form>';
}
echo '<div id="legend">';
echo '<h3><img src="sq.jpg" /> Scheduled Events<br/><img src="calBg.jpg" height="10"/> Todays Date</div></h3>';

$q="select * from company where orgname='$orgname'";
$r=mysql_query($q);
$result_ro = mysql_fetch_array($r);
$company_id=$result_ro['company_id'];
//$_SESSION['company_id']=$company_id;
//echo $orgname;
//echo $company_id;


//echo $cuid;

//$todaysDate = date("n/j/Y");
//echo $todaysDate;
// Get values from query string
$day = (isset($_GET["day"])) ? $_GET['day'] : "";
$month = (isset($_GET["month"])) ? $_GET['month'] : "";
$year = (isset($_GET["year"])) ? $_GET['year'] : "";
//comparaters for today's date
//$todaysDate = date("n/j/Y");
//$sel = (isset($_GET["sel"])) ? $_GET['sel'] : "";
//$what = (isset($_GET["what"])) ? $_GET['what'] : "";

//$day = (!isset($day)) ? $day = date("j") : $day = "";
if(empty($day)){ $day = date("j"); }

if(empty($month)){ $month = date("n"); }

if(empty($year)){ $year = date("Y"); } 
//set up vars for calendar etc
$currentTimeStamp = strtotime("$year-$month-$day");
$monthName = date("F", $currentTimeStamp);
$numDays = date("t", $currentTimeStamp);
$counter = 0;
//$numEventsThisMonth = 0;
//$hasEvent = false;
//$todaysEvents = ""; 
//run a selec statement to hi-light the days
function hiLightEvt($eMonth,$eDay,$eYear,$company_id){
//$tDayName = date("l");
//print $company_id;

$todaysDate = date("n/j/Y");
$dateToCompare = $eMonth . '/' . $eDay . '/' . $eYear;
if($todaysDate == $dateToCompare){
//$aClass = '<span>' . $tDayName . '</span>';
$aClass='class="today"';
}else{
//$dateToCompare = $eMonth . '/' . $eDay . '/' . $eYear;
//echo $todaysDate;
//return;
$sql="select count(event_date) as eCount from event where (event_date = '" . $eMonth . '/' . $eDay . '/' . $eYear . "' AND company_id='$company_id')";
//echo $sql;
//return;
$result = mysql_query($sql);
while($row= mysql_fetch_array($result)){
if($row['eCount'] >=1){
$aClass = 'class="event"';
}elseif($row['eCount'] ==0){
$aClass ='class="normal"';
}
}
}
return $aClass;
}
?>

<table width="1250" >
<tr><td valign="top">

<table width="350" cellpadding="0" cellspacing="0">
<tr>
<td width="50" colspan="1">
<input type="button" value=" < " onClick="goLastMonth(<?php echo $month . ", " . $year; ?>);">
</td>
<td width="250" colspan="5">
<span class="title"><?php echo $monthName . " " . $year; ?></span><br>
</td>
<td width="50" colspan="1" align="right">
<input type="button" value=" > " onClick="goNextMonth(<?php echo $month . ", " . $year; ?>);">
</td>
</tr> 
<tr>
<th>S</td>
<th>M</td>
<th>T</td>
<th>W</td>
<th>T</td>
<th>F</td>
<th>S</td>
</tr>
<tr>
<?php
for($i = 1; $i < $numDays+1; $i++, $counter++){
$dateToCompare = $month . '/' . $i . '/' . $year;
$timeStamp = strtotime("$year-$month-$i");
//echo $timeStamp . '<br/>';
if($i == 1){
// Workout when the first day of the month is
$firstDay = date("w", $timeStamp);
for($j = 0; $j < $firstDay; $j++, $counter++){
echo "<td>&nbsp;</td>";
} 
}
if($counter % 7 == 0){
?>
</tr><tr>
<?php
}


?>
<!--right here--><td width="50" <?=hiLightEvt($month,$i,$year,$company_id);?>><a href="<?=$_SERVER['PHP_SELF'] . '?month='. $month . '&day=' . $i . '&year=' . $year;?>&v=1"><?=$i;?></a></td> 
<?php
}
?>
</table>
<?php
if(isset($_GET['v'])){
if(isset($_POST['Submit'])){
$sql="insert into event values('','$company_id','" . $_POST['calName'] ."','" . $_POST['calDesc'] . "',now(),'" . $_POST['calDate'] . "')";
$res=mysql_query($sql);
?>
<meta http-equiv="refresh" content="0;url=calendar_rec.php?month=<?=$_SESSION['month'] . '&day=' . $_SESSION['day'] . '&year=' . $_SESSION['year'];?>&v=1" >
<?php
}
$sql="select event_id,event_title,event_desc, DATE_FORMAT(dateposted, '%a %b %e %Y') as calStamp from event where event_date = '" . $month . '/' . $day . '/' . $year . "' AND company_id='$company_id'";
//echo $sql;
//return;
$result = mysql_query($sql);
$numRows = mysql_num_rows($result);

$x=date("j");
$y=date("n");
$z=date("Y");
//echo $x." ".$y." ".$z;
if(!isset($_SESSION['cuid']))
{
$flag=0;
if($_GET['year'] > $z)
{
	$flag=1;
}
elseif($_GET['year'] == $z && $_GET['month'] > $y)
{
	$flag=1;
}
elseif($_GET['year'] == $z && $_GET['month'] == $y && $_GET['day'] >= $x)
{
	$flag=1;
}

if($flag==1)
{
$_SESSION['month']=$_GET['month'];
$_SESSION['day']=$_GET['day'];
$_SESSION['year']=$_GET['year'];
?>
<h4 align="left"><a href="<?=$_SERVER['PHP_SELF'];?>?month=<?=$_GET['month'] . '&day=' . $_GET['day'] . '&year=' . $_GET['year'];?>&v=1&f=true">New Event</a></h4><br/>
<?php
}
}
if(isset($_GET['f']))
{
$kanthmonth=$_GET['month'];
$kanthday=$_GET['day'];
$kanthyear=$_GET['year'];

include 'calForm_rec.php';
}

echo '</td><td valign="top" align="left">';
if($numRows == 0 ){
echo '<div class="output" align="left"><h3 align="left">No Events</h3></div>';
}else{
//echo '<ul>';
echo '<div class="output" align="left"><h3 align="left">Events Listed</h3></div>';
?>
<form name=form2 method="post" onsubmit="return confirm('Are you sure you want to delete these events?')">
<?php
while($row = mysql_fetch_array($result)){
?>  
<div class="output" align="left">
<b><?php if(isset($_SESSION['name'])){  ?><input type="checkbox" name="name[]" value="<?php echo $row['event_id'];?>"> <?php } ?> Event Title: </b><?=$row['event_title'];?><br/>
<b>Event Description: </b> <?=$row['event_desc'];?><br/>
<b>Listed On: </b><?=$row['calStamp'];?>
</div>
<?php
}
$checked=$_POST['name'];
echo '<input type="submit" value="Delete Events" name="delete">';
echo '</form>';
}
}
?>
</td></tr>
</table>
</body>
</html>

<?php
$_SESSION['month']=$_GET['month'];
$_SESSION['day']=$_GET['day'];
$_SESSION['year']=$_GET['year'];

if(isset($_POST['delete']))
{
foreach($checked as $check)
{
  $k=$check;
  $query="delete from event where event_id='$k'";
  $res=mysql_query($query) or die(mysql_error());			
}

?>
<meta http-equiv="refresh" content="0;url=calendar_rec.php?month=<?=$_SESSION['month'] . '&day=' . $_SESSION['day'] . '&year=' . $_SESSION['year'];?>&v=1" >
<?php
}
if(isset($_POST['subscribe']))
{
	$q1="insert into cal_subscription values('','".$_SESSION['email']."','".$_SESSION['orgname']."')";
	$r1=mysql_query($q1);
?>
	<meta http-equiv="refresh" content="0;url=calendar_rec.php?month=<?=$_SESSION['month'] . '&day=' . $_SESSION['day'] . '&year=' . $_SESSION['year'];?>&v=1" >
<?php
}
if(isset($_POST['unsubscribe']))
{
	$q2="delete from cal_subscription where email='".$_SESSION['email']."' AND orgname='".$_SESSION['orgname']."'";
	$r2=mysql_query($q2);
?>
	<meta http-equiv="refresh" content="0;url=calendar_rec.php?month=<?=$_SESSION['month'] . '&day=' . $_SESSION['day'] . '&year=' . $_SESSION['year'];?>&v=1" >
<?php
}

?>