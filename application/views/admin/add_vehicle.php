<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>add_vehicle</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php echo form_open(base_url('Vehicle_Controller/add_vehilcle'));?>
		<label for="name">Name</label>
		<input type="text" name="name"><br>
		<label for="reg_no">Register No</label>
		<input type="text" name="reg_no"><br>
		<label for="seat">Seat</label>
		<input type="text" name="seat"><br>
		<label for="price">Price</label>
		<input type="text" name="price"><br>
		<div><button  name="button">Submit</button></div>
	<?php echo form_close() ?>
	<?php if(isset($message))
		{
			echo $message;

		} ?>
</body>
</html>