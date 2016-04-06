<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/touchTouch.css">
<link rel="stylesheet" href="css/style.css">



<script>
  $(window).load(function(){
    $().UItoTop({ easingType: 'easeOutQuart' });
    $('.gallery .info').touchTouch();
  }); 

   $(document).ready(function(){
       $(".shuffle-me").shuffleImages({
         target: ".images > img"
       });
    });
</script>
</head>

<body class="page1" id="top">
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
        <a href="www.facebook.com" class="fa fa-facebook"></a>
        </div>
        <div class="navigation ">
          <nav>
            <ul class="sf-menu">
             <li class="current"><a href="index.php">Home</a></li>
             <li><a href="about.php">About</a></li>
             <li><a href="gallery.php">Gallery</a></li>
             <li><a href="services.php">services</a></li>
             <li><a href="contacts.php">Contacts</a></li>
	     <li><a href="log.php">Login</a></li>
	    <li><a href="admlog.php">Admin</a></li>
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
<section id="content"><div class="ic"></div>
  <div class="container">
    <div class="row">
      <div class="page1_block">
        <div class="grid_6">
        <img src="photos/events.JPG" alt="" width="800" height="464"></div>
        <div class="grid_6">
          <h2>We Create.....<br> You Celebrate...</h2>
          <div class="row">
            <div class="grid_3">
              <img src="photos/33.jpg" alt="">
            </div>
            <div class="grid_3">
              <img src="photos/39.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="grid_10 preffix_1">
        <div class="block1">
          <div class="block1_title">
            
            <span>Most popular online event management team in kerala "EVENTRUM"</span>
          </div>
         
  <div class="container gallery">
    <div class="row">
      <div class="grid_8">
        <h4>Recent Events</h4>
        <div class="row">
          <div class="grid_4">
            <div class="view">  
              <img src="photos/46.jpg" alt="" />  
              <div class="mask">
                
              </div>  
            </div>   
          </div>
          <div class="grid_4">
            <div class="view">
              <img src="photos/49.jpg" alt="" width="319" height="218" />
              <div class="mask">              </div>  
            </div>   
          </div>
          <div class="grid_4">
            <div class="view">  
              <img src="photos/44.jpg" alt="" />  
              <div class="mask">
                 
              </div>  
            </div>   
          </div>
          <div class="grid_4">
            <div class="view">  
              <img src="photos/51.jpg" alt="" />  
              <div class="mask">
                
              </div> 
            </div>   
          </div>
        </div>
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
        <div class="copyright">< <class="f_logo"><img src="images/f_logo.png" alt=""></a> &copy; <span id="copyright-year"></span>Privacy Policy
          <div class="sub_copyright">
            Website designed by <a href="http://www.eventrum.com" rel="nofollow">eventrum.com</a>
          </div>
        </div>
      </div>
    </div>

  </div>  
</footer>
</div>
</body>

</html>

