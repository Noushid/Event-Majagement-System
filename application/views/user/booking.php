<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>event</title>
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('admin/css/styleapp.css');?>">
    <script type="text/javascript" src="<?php echo base_url('admin/js/appjs.js');?>"></script>
    <style>
        .multiselect {
            width: 200px;
        }

        .selectBox {
            position: relative;

        }

        .selectBox select {
            width: 100%;
            font-weight: bold;
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        .checkboxes {
            display: none;
            border: 1px #dadada solid;
        }

        #checkboxes label {
            display: block;
        }

        #checkboxes label:hover {
            background-color: #1e90ff;
        }

    </style>
    <script type="text/javascript">
        var expanded = [false, false, false];
        var checkboxes;

        function showCheckboxes(i) {
            var checkboxes = checkboxes || document.getElementsByClassName("checkboxes");
            if (!expanded[i]) {
                checkboxes[i].style.display = "block";
                expanded[i] = true;
            } else {
                checkboxes[i].style.display = "none";
                expanded[i] = false;
            }
        }

    </script>
</head>
<body>
<script src="<?php echo base_url('js/date_picker.js')?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>


<script type="text/javascript">
    $(function() {
        $( "#startdate" ).datepicker();
    });

    $(function() {
        $( "#enddate" ).datepicker();
    });
</script>
<div class="page-wrapper">
    <div class="left-wrapper">
        <?php echo user_menu('dashboard');?>
    </div>
    <nav class="top-wrapper">
        <div class="sidebar-top">
            <button class="humburger pull-left">
                <i class="fa fa-bars fa-2x center-block"></i>
            </button>
            <ul class="menu-top pull-right">
                <li>
                    <a href="#"><i class="fa fa-envelope-o fa-lg"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bell-o fa-lg"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="settings" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog fa-lg"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="settings">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url($_SESSION['username'].'/logout');?>">logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div>

        <?php echo form_open(base_url($_SESSION['username'].'/booking/submit'));?>
            <div class="">
                <div class="form-group col-md-5">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" ><br>
                </div>

                <div class="form-group col-md-2">
                    <label for="type">category</label>
                    <select class="form-control" name="category" id="category" >
                        <?php if (isset($category)) {
                            foreach ($category as $value) {
                                echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                            }
                        }?>

                    </select>
                </div>


                <div class="form-group col-md-2">
                    <label for="venue">venue</label>
                    <select class="form-control " name="venue" id="venue" >
                        <?php if (isset($venue)) {
                            foreach ($venue as $value) {
                                echo '<option value="'.$value->id.'">'.$value->name.'('.$value->type.')'.'</option>';
                            }

                        }?>

                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="decaration">decoration</label>
                    <select class="form-control" name="decoration" id="decoration" >
                        <?php if (isset($decoration)) {
                            foreach ($decoration as $value) {
                                echo '<option value="'.$value->id.'">'.$value->name.'('.$value->price.')'.'</option>';
                            }
                        }?>

                    </select><br/>
                </div>

                <div class="form-group col-md-12 ">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="10" rows="3" class="form-control"></textarea>
                    <!--                    <input class="form-control" type="text" name="description"><br>-->
                </div>

                <div class="form-group col-md-2 ">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="startdate"  placeholder="yyyy/mm/dd"><br>
                </div>

                <div class="form-group col-md-2">
                    <label for="start_time">Start Time</label>
                    <input type="text" class="form-control" name="start_time"  id="enddate"placeholder="hh/mm"><br>
                </div>
                <div class="form-group col-md-2">
                    <label for="end_date">End Date</label>
                    <input type="text" class="form-control" name="end_date"  placeholder="yyyy/mm/dd"><br>
                </div>
                <div class="form-group col-md-2">
                    <label for="end_time">End Time</label>
                    <input type="text" class="form-control" name="end_time"  placeholder="hh/mm"><br>
                </div>

                <div class="form-group col-md-2">
                    <label for="no_of_pepole">No Of Pepole</label>
                    <input class="form-control" type="text" name="people" ><br>
                </div>

<!--                <div class="multiselect">-->
<!--                    <div class="selectBox" onclick="showCheckboxes(0)">-->
<!--                        <select>-->
<!--                            <option>Breakfast</option>-->
<!--                        </select>-->
<!--                        <div class="overSelect"></div>-->
<!--                    </div>-->
<!--                    <div class="checkboxes">-->
<!--                        --><?php //$i =0; if (isset($food)) {
//                            foreach ($food as $value) {
//                                $i++;
//                                echo '<label for="one">
//                                        <input type="checkbox" id="'.$value->id.'" name="item'.$i.'" value="hjkh"/>'.$value->name.'</label> </br>';
//                            }
//                        }?>
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="multiselect">-->
<!--                    <div class="selectBox" onclick="showCheckboxes(1)">-->
<!--                        <select>-->
<!--                            <option>check box2</option>-->
<!--                        </select>-->
<!--                        <div class="overSelect"></div>-->
<!--                    </div>-->
<!--                    <div class="checkboxes">-->
<!--                        <label for="one">-->
<!--                            <input type="checkbox" id="one" />First checkbox</label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="multiselect">-->
<!--                    <div class="selectBox" onclick="showCheckboxes(2)">-->
<!--                        <select>-->
<!--                            <option>check box3</option>-->
<!--                        </select>-->
<!--                        <div class="overSelect"></div>-->
<!--                    </div>-->
<!--                    <div class="checkboxes">-->
<!--                        <label for="one">-->
<!--                            <input type="checkbox" id="one" />First checkbox</label>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="multiselect">-->
<!--                    <div class="selectBox" onclick="showCheckboxes(3)">-->
<!--                        <select>-->
<!--                            <option>check box3</option>-->
<!--                        </select>-->
<!--                        <div class="overSelect"></div>-->
<!--                    </div>-->
<!--                    <div class="checkboxes">-->
<!--                        <label for="one">-->
<!--                            <input type="checkbox" id="one" />First checkbox</label>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!---->
                <div class="col-md-12">
                    <button  class="btn btn-default" name="button">Submit</button>
                    <button  class="btn btn-danger" name="reset">reset</button>
                </div>

            </div>
        <?php echo form_close() ?>
    </div>
</div>
<?php if(isset($message))
{
    echo $message;

} ?>
</div>
</body>
</html>