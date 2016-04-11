<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>event</title>
    <link rel="stylesheet" href="">
</head>
<body>
<!--<script src="--><?php //echo base_url('js/date_picker.js')?><!--"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>


<script type="text/javascript">
//    $(function() {
//        $( "#datepicker" ).datepicker();
//    });
</script>

<?php echo form_open(base_url($_SESSION['username'].'/booking/submit'));?>
<label for="name">Name</label>
<input type="text" name="name" required=""><br>

<label for="description">Description</label>
<input type="text" name="description"><br>

<label for="type">category</label>
<select name="category" id="category" required="">
    <?php if (isset($category)) {
        foreach ($category as $value) {
            echo '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
    }?>

</select><br/>

<label for="venue">venue</label>
<select name="venue" id="venue" required="">
    <?php if (isset($venue)) {
        foreach ($venue as $value) {
            echo '<option value="'.$value->id.'">'.$value->name.'('.$value->type.')'.'</option>';
        }

    }?>

</select><br/>

<label for="decaration">decoration</label>
<select name="decoration" id="decoration" required="">
    <?php if (isset($decoration)) {
        foreach ($decoration as $value) {
            echo '<option value="'.$value->id.'">'.$value->name.'('.$value->price.')'.'</option>';
        }
    }?>

</select><br/>

<label for="start_date">Start Date</label>
<input type="date" name="start_date" id="datepicker" required="" placeholder="yyyy/mm/dd"><br>

<label for="start_time">Start Time</label>
<input type="text" name="start_time" required="" placeholder="hh/mm"><br>

<label for="end_date">End Date</label>
<input type="text" name="end_date" required="" placeholder="yyyy/mm/dd"><br>

<label for="end_time">End Time</label>
<input type="text" name="end_time" required="" placeholder="hh/mm"><br>


<label for="no_of_pepole">No Of Pepole</label>
<input type="text" name="people" required=""><br>

<label for="food1">first food</label>
<select name="food1" id="food1">
    <option value="hjbkjh">kjhlk</option>
</select>

<label for="fooditem1">quantity</label>
<select name="fooditem1" id="fooditem1">
    <option value="hjbkjh">kjhlk</option>
</select><br/>

<label for="food2">Second food</label>
<select name="food2" id="food2">
    <option value="kjkj">jhbjh</option>
</select>

<label for="fooditem">quantity</label>
<select name="fooditem" id="fooditem2">
    <option value="hjbkjh">kjhlk</option>
</select><br/>

<label for="food3">Third food</label>
<select name="food3" id="food3">
    <option value="kjnkj">kjkjh</option>
</select>

<label for="fooditem3">quantity</label>
<select name="fooditem3" id="fooditem3">
    <option value="hjbkjh">kjhlk</option>
</select><br/>

<div><button  name="button">Submit</button></div>
<?php echo form_close() ?>
<?php if(isset($message))
{
    echo $message;

} ?>
</div>
</body>
</html>