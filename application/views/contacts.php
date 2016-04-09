<!DOCTYPE html>
<html lang="en">
<head>
<title>Contacts</title>
<meta charset="utf-8">
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="<?php echo base_url('images/favicon.ico') ?>">
<link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico') ?>" />
<link rel="stylesheet" href="<?php echo base_url('css/contact-form.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>">

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
             <li><a href="<?php echo base_url('index') ?>">Home</a></li>
             <li><a href="<?php echo base_url('about') ?>">About</a></li>
             <li><a href="<?php echo base_url('gallery') ?>">Gallery</a></li>
             <li><a href="<?php echo base_url('services') ?>">services</a></li>
             <li class="current"><a href="<?php echo base_url('contacts') ?>">Contacts</a></li>
             <li><a href="<?php echo base_url('login') ?>">Login</a></li>
	     <li><a href="<?php echo base_url('admin-log') ?>">Admins</a></li>
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
<div>
      <h5>Please add youar commands and suggestions here</h5>
</div>
  <div class="container">
    <div class="row">
      <div class="grid_12">
        <h4>Find Us</h4>
        <div class="map">
          <figure class="">
            <!-- <iframe src="https://www.google.com/maps/place/sullamussalam+science+collage/@11.2336962,76.0381201,18z/data=!4m2!3m1!1s0x0000000000000000:0x9cbddeb7aae23a7b style="border:0"></iframe> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2564.958900464012!2d36.23097800000001!3d49.993379999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a0f009ab9f07%3A0xa21e10f67fa29ce!2sGeorgia+Education+Center!5e0!3m2!1sen!2sin!4v1436943860334" allowfullscreen></iframe>
          </figure>
        </div>
      </div>
      <div class="clear"></div>
      <div class="grid_5">
        <h4>Contact Info</h4>
        <p class="text1 offset__1">Eventrum Online Event Management Company</p>
        <p> NO 1 Online Event management Company  go with 24/7 support. </p>
        Eventrum  Inc. <br>
        Telephone:+91 9747855179,0483 3296335<br>
        FAX:889 9898<br>
        E-mail: <a href="www.gmail.com">eventrum@gmail.com</a>
      </div>
      <div class="grid_6 preffix_1">
        <h4>Contact Form</h4>
        <form id="contact-form">
          <div class="contact-form-loader"></div>
          <fieldset>
            <label class="name">
              <input type="text" name="name" placeholder="Name:" value="" data-constraints="@Required @JustLetters"  />
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*This is not a valid name.</span>
            </label>
           
            <label class="email">
              <input type="text" name="email" placeholder="E-mail:" value="" data-constraints="@Required @Email" />
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*This is not a valid email.</span>
            </label>
            <label class="phone">
              <input type="text" name="phone" placeholder="Phone:" value="" data-constraints="@Required @JustNumbers" />
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*This is not a valid phone.</span>
            </label>
           
            <label class="message">
              <textarea name="message" placeholder="Message:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*The message is too short.</span>
            </label>
            <div>
              <a href="#" class="btn" data-type="reset">Clear</a>
              <a href="#" class="btn" data-type="submit">Send</a>
            </div>
          </fieldset> 
          <div class="modal fade response-message">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                  You message has been sent! We will be in touch soon.
                </div>      
              </div>
            </div>
          </div>
        </form>
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
        <div class="copyright"><img src="<?php echo base_url('images/f_logo.png') ?>" alt=""></a> &copy; <span id="copyright-year"></span> | Privacy Policy
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

