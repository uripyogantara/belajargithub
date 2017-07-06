<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<form method="POST" action="foo">
	Enter Your name
	<input type="text" name="name">
	<input type="submit" value="submit">
	<?php echo csrf_field();
 ?>
</form>
</body>
</html>