<?php
error_reporting(0);
session_start();
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email'])) && !(isset($_SESSION['admin']))) 
{
die("You are not logged in. Click <a href='login.php'>here to login</a>");
}	

$querystring=$_SERVER['QUERY_STRING'];

list($id,$delete)=split("=",$querystring);

echo $id;

$q1="select * from forums where forum_id='$id'";
$r1=mysql_query($q1);
$a=mysql_fetch_array($r1);

$q= "delete from forums where forum_id='$id'";
$r=mysql_query($q);
$dest="Location: discussion.php?did=".$a[5];

echo $dest;
header($dest);



?>