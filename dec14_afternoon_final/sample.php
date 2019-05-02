<script type="text/javascript" language="javascript">

function nav()
{
//	alert("hello");
//	document.write("hello");
//	window.navigate("http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/inbox.php");
	if(myform.txt.value != "")
	{
		alert("hello");
 		var srch= myform.text.value;
//		document.write(srch);
		window.navigate("http://pba.cs.clemson.edu/~f09t10/Project/Milestone1/inbox.php");
	}

}
</script>

<html>

<form method="post" name="myform" >
<input type="text" name="txt" /> 
<input type="button" value="button" name="button" onclick="nav()" />

</form>


</html>