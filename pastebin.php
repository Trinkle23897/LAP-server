<html>
<head>
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="stylesheet" href="style/bootstrap-theme.min.css">
<script src="style/jquery.min.js"></script>
<script src="style/bootstrap.min.js"></script>
</head>
<body>
	<center>
		<h1>Pastebin</h1>
<?php echo '<textarea name="text" form="bin" rows="30" cols="100">'.fread(fopen('_','r'),filesize('_')).'</textarea>'; ?>
		<form action="write_paste.php" method="post" id='bin'>
			<br/>
			<input type="submit" name="submit" value="submit" class="btn btn-info"/>
		</form>
	</center>
</body>
</html>
