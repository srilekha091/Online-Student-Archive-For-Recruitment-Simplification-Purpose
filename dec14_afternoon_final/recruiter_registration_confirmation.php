<?php
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
$queryString = $_SERVER['QUERY_STRING'];
$query = "SELECT * FROM recruiter";
$result = mysql_query($query) or die(mysql_error());
  while($row = mysql_fetch_array($result))
  {
    $recid=$row["recruiter_id"];
    if ($queryString == $row["activation_key"]){
       echo "Congratulations " . $row["username"] . ". You can now access the system by clicking on the link below !";
    $sql="UPDATE recruiter SET activation_key = '', activate='active' WHERE $recid=$row[recruiter_id]";
	echo '<br /><br /><br />';
    echo '<a href="logout.php">Click here to login!</a>';
   if (!mysql_query($sql))
  {
        die('Error: ' . mysql_error());
  }
    }
  }
?>

