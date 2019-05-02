<?php
/*error_reporting(0);
chmod("/home/f09t10/public_html/Project/Milestone1/uploads/google/Clemson_Colge.jpg",0777);
unlink("/home/f09t10/public_html/Project/Milestone1/uploads/google/Clemson_Colge.jpg");
*/
/*echo '<input type="button" value="Click Here" onClick="doSomething();">'; */

 header('Content-type: image/jpeg');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="saibaba.jpeg"');

// The PDF source is in original.pdf
readfile('student_attachment/rakkera/saibaba.jpeg');

?>


