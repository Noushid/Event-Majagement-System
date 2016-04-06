<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>add entertiment</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php echo form_open(base_url('Entertiment_Controller/add_entr'));?>
		<label for="Name">Name</label><input type="text" name="name">
		<label for="Type"> Type</label><input type="text" name="type">
		<div><button  name="button">Submit</button></div>
	<?php echo form_close() ?>
	<?php if(isset($message))
		{
			echo $message;

		} ?>
</body>
</html>