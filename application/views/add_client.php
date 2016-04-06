<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>client</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php echo form_open(base_url('Client_Controller/add_client'));?>
		<label for="name">Name</label>
		<input type="text" name="name"><br>
		<label for="address">Address</label>
		<input type="text" name="address"><br>
		<label for="place">Place</label>
		<input type="text" name="place"><br>
		<label for="phone">Phone NO</label>
		<input type="text" name="phone"><br>
		<label for="bank">Bank Name</label>
		<input type="text" name="bank"><br>
		<label for="a/c">A/c No</label>
		<input type="text" name="ac_no"><br>
		<label for="amount">Amount</label>
		<input type="text" name="amount"><br>
		<div><button  name="button">Submit</button></div>
	<?php echo form_close() ?>
	<?php if(isset($message))
		{
			echo $message;

		} ?>
</body>
</html>