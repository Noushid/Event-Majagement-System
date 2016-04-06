<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>add payment</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php echo form_open(base_url('Payment_Controller/add_payment'));?>
		<label for="name">Name</label>
		<input type="text" name="name"><br>	
		<label for="from">A/c No From</label>
		<input type="text" name="from"><br>	
		<label for="to">A/c No To</label>
		<input type="text" name="to"><br>
		<label for="address">Address</label>
		<input type="text" name="address"><br>
		<label for="phone">phone No</label>
		<input type="text" name="phone"><br>
		<label for="email">email</label>
		<input type="email" name="email"><br>
		<div><button  name="button">Submit</button></div>
	<?php echo form_close() ?>
	<?php if(isset($message))
		{
			echo $message;

		} ?>
</body>
</html>