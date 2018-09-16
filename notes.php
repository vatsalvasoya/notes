<?php
session_start();
ob_start();
		$conn = mysqli_connect("localhost","root","","notes");
		if($conn)
		{
			//echo "connection established";
		}
	if(isset($_POST['delete']))
	{
		$a=$_POST['id'];
		$res1 = mysqli_query($conn,"delete from post where id=$a");
	}

	if(isset($_POST['update']))
	{
		$a=$_POST['id'];
		header("location:form.php?id=".$a);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>notes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<?php 
			$res = mysqli_query($conn,"select * from post");
			while($row = mysqli_fetch_assoc($res))
			{
		?>
		<div class="panel panel-default" style=" background-color: yellow;width: 500px;margin-left: 200px;">
			<div class="panel-heading"><?php echo $row["head"];?></div>
			<div class="panel-body">
			<?php echo $row["descr"];?><br><br><br>
			<form action="notes.php" method="post">
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<input type="submit" name="delete" class="btn btn-primary" value="delete">
			<input type="submit" name="update" class="btn btn-primary" value="update">

			</form>

			</div>
		</div>
		<br>
		<?php
			}
		 ?>
	</div>


  
</div>

</body>
</html>