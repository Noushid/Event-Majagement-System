<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="web design, web development, web site development, web site design, web design development, e-commerce, ecommerce, interactive, new media, development, Manjeri, hove, Manjeri web design, Manjeri ecommerce, Manjeri e-commerce, Manjeri web development, malappuram, content management, cms, web site, web sites, psybo, psybo technologies, psybotechnologies">
    <meta name="description" content="Psybo technologies is a small web design &amp; development agency based in Manjeri, Malappuram, INDIA. We've made a reputation for building websites that look great and are easy-to-use.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url('admin/img/ico.png');?>" type="image/png" sizes="47x54">
    <title>Eventrum</title>
    <link rel="stylesheet" href="<?php echo base_url('admin/css/styleapp.css');?>">
    <script type="text/javascript" src="<?php echo base_url('admin/js/appjs.js');?>"></script>
</head>
<body>
<div class="page-wrapper">
    <div class="left-wrapper">
        <?php echo dashboard_menu('dashboard');?>
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
                    <a href="<?php echo base_url('dashboard/logout');?>">logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <h2>welcome</h2>
    <div class="col-md-8">

    </div>
    <div class="col-md-3">
        <div class="row">
            <div id="widget">
                <div id="outline">
                    <div class="date">
                        <div id="month"></div>
                        <div id="day"></div>
                        <div id="week"></div>
                    </div>
                    <div class="time">
                        <div id="hour"></div>
                        <div id="minut"></div>
                        <!-- <div id="second"></div> -->
                        <div id="date"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
