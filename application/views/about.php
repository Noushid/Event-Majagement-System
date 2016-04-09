<!DOCTYPE html>
<html lang="en">
<head>
<title>About</title>

<meta charset="utf-8">
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="<?php echo base_url('images/favicon.ico'); ?>">
<link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">

<script>
  $(window).load(function(){
    $().UItoTop({ easingType: 'easeOutQuart' });
  }); 
</script>

</head>

<body>
  <div class="main">
<!--==============================
              header
=================================-->
<header>
  <div class="container">
    <div class="row">
      <div class="grid_12">
        <h1>
          
            <img src="images/logo.png" alt="Logo alt">
          
        </h1>
        <div class="socials">
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-google-plus"></a>
        </div>
        <div class="navigation ">
          <nav>
            <ul class="sf-menu">
             <li><a href="<?php echo base_url('home') ?>">Home</a></li>
             <li class="current"><a href="<?php echo base_url('about') ?>">About</a></li>
             <li><a href="<?php echo base_url('gallery') ?>">Gallery</a></li>
             <li><a href="<?php echo base_url('services') ?>">services</a></li>
             <li><a href="<?php echo base_url('contacts') ?>">Contacts</a></li>
             <li><a href="<?php echo base_url('login') ?>">Login</a></li>
	     <li><a href="<?php echo base_url('admin-log') ?>">Admin</a></li>
           </ul>
          </nav>
          <div class="clear"></div>
        </div>       
      </div>
    </div>
  </div>
</header>
<!--=====================
          Content
======================-->
<section id="content">
  <div class="container">
    <div class="row">
      <div class="grid_9">
        <h4>About Our Agency</h4>
        <div class="row">
          <div class="grid_8">
            <img src="images/page2_img.jpg" alt="" class="img_inner fleft">
            <div class="extra_wrapper">
              <p class="text1 offset__1">The Name eventrum has been chosen wisely, we spread it in front of you to realize your dream events, from weddings to corporate conferences. Established in the year 2016, at calicut-Kerala, Eventrum Events has now branches all across Kerala and associates all over India, to make an event happen right in front of you. We believe each client is a partner for us, delivering what they want is an opportunity, and satisfying them is the perfection, derived out of our immense experience gained through the years. From planning to marketing and executing the event, we have expertise dedicated to their job, delivering 100% Efficiency.

. </p>
              <p>At Eventrum Events our mission as an event organiser is to create and deliver the most amazing events we expertly plan and manage events for some of the leading brands,blending creativity with innovation & flawless delivery</p>
             
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <h4 class="head__1">Our Work Team</h4>
        <div class="row">
          <div class="grid_3">
            <div class="block2">
              <div class="maxheight">
                <img src="<?php echo base_url('images/page2_img1.jpg'); ?>" alt="" class="img_inner">
                <div class="color2">- ANSHA</div>
                <em class="italic">EVENT MANAGER</em>
              </div>
            </div>
          </div>
          <div class="grid_3">
            <div class="block2">
              <div class="maxheight">
                <img src="<?php echo base_url('images/page2_img2.jpg'); ?>" alt="" class="img_inner">
                <div class="color2">- UNAIS MK</div>
                <em class="italic">planning in charge</em>
              </div>
            </div>
          </div>
          <div class="grid_3">
            <div class="block2">
              <div class="maxheight">
                <img src="<?php echo base_url('images/page2_img3.jpg'); ?>" alt="" class="img_inner">
                <div class="color2">- FATHIMA SHANA M</div>
                <em class="italic">Designer in charge</em>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="grid_3">
        <h4>Events</h4>
        <ul class="list">
          <li>
            <div class="count">1</div>
            <div class="extra_wrapper">
            <p class="text1 offset__1">Wedding planing</p>
             </div>
          </li>
          <li>
            <div class="count">2</div>
            <div class="extra_wrapper">
            <p class="text1 offset__1">Birth day celebration</div>
          </li>
          <li>
            <div class="count">3</div>
            <div class="extra_wrapper">
            <p class="text1 offset__1">Corparate events</div>
          </li>
		  <li>
            <div class="count">4</div>
            <div class="extra_wrapper">
            <p class="text1 offset__1">House warming</div>
          </li>
		   <li>
            <div class="count">5</div>
            <div class="extra_wrapper">
            <p class="text1 offset__1">Tours and Trekking</div>
          </li>
        </ul>
        <h4>Special Features</h4>
        <ul class="list1">
          <li>Wedding Cards </li>
          <li>Infrastructure</li>
          <li>Decoration</li>
          <li>Food and Catering </li>
          <li>Transportation</li>
          <li>Entertainment</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!--==============================
              footer
=================================-->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="grid_12"> 
        <div class="copyright"><img src="<?php echo base_url('images/f_logo.png') ?>" alt="">&copy; <span id="copyright-year"></span> Privacy Policy
          <div class="sub_copyright">
            Website designed by <a href="" rel="nofollow">ansha and shana</a>
          </div>
        </div>
      </div>
    </div>

  </div>  
</footer>

</div>
</body>

</html>

