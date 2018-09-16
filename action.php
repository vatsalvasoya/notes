<?php
	ob_start();
	session_start();
	$conn = mysqli_connect("localhost","root","","notes");
	if($conn)
	{
		//echo "connection established";
	}
	if(isset($_POST['submit']))
	{
		$a=$_POST['id'];	
		$b=$_POST['head'];
		$c=$_POST['descr'];
		echo $a.$b.$c;
		$res = mysqli_query($conn,"UPDATE `post` SET `head`='$b',`descr`='$c' WHERE id=$a");
		header("location:notes.php");
	}

?>