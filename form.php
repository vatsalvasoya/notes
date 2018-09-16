<?php 
ob_start();
session_start();
$conn = mysqli_connect("localhost","root","","notes");
	if($conn)
	{
		//echo "connection established";
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
			$id=$_GET['id'];
			$_SESSION['uid'] = $id;
			$res = mysqli_query($conn,"select * from post where id=$id");
			while($row = mysqli_fetch_assoc($res))
			{
		?>
		<form action="action.php" method="post">
			<input type="text" name="id" value="<?php echo $row['id'];?>" hidden>
			<label>Title</label><input type="text" name="head" value="<?php echo $row['head']?>" >
			<label>Description</label><input type="text" name="descr" value="<?php echo $row['descr']?>">
			<input type="submit" name="submit" value="update">
		</form>
	<?php }?>
	</div>
</body>