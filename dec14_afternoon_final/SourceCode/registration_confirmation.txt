<?php
mysql_connect('localhost','f09t10','cpsc123') or die('Connect Error');
mysql_select_db('f09t10') or die('Database Error');
$queryString = $_SERVER['QUERY_STRING'];
$query = "SELECT * FROM student";
$result = mysql_query($query) or die(mysql_error());
  while($row = mysql_fetch_array($result))
  {
    $cuid=$row["cuid"];
    if ($queryString == $row["activation_key"]){
       echo "Congratulations!" . $row["username"] . " is now the proud new owner of a YOURWEBSITE.com account.";
  $sql="UPDATE student SET activation_key = '', activate='active' WHERE ($cuid = $row[cuid])";
       if (!mysql_query($sql))
  {
        die('Error: ' . mysql_error());
  }
    }
  }
?>

