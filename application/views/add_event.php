<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>event</title>
	<link rel="stylesheet" href="">
</head>
<body>
<?php echo form_open(base_url('Event_Controller/add_event'));?>
	<label for="name">Name</label>
	<input type="text" name="name"><br>
	<label for="description">Description</label>
	<input type="text" name="description"><br>
	<label for="start_time">Start Time</label>
	<input type="text" name="start_time"><br>
	<label for="start_date">Start Data</label>
	<input type="text" name="start_date"><br>
	<label for="end_time">End Time</label>
	<input type="text" name="end_time"><br>
	<label for="end_date">End Date</label>
	<input type="text" name="end_date"><br>
	<label for="no_of_pepole">No Of Pepole</label>
	<input type="text" name="people"><br>
	<div><button  name="button">Submit</button></div>
	<?php echo form_close() ?>
	<?php if(isset($message))
		{
			echo $message;

		} ?>
		</div>
</body>
</html>