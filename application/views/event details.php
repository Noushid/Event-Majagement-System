<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8">
<title>event_deatiles</title>
<link rel="stylesheet" type="text/css" href="cs1.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

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
  <div class="table">
    <div class="row">
      <div class="grid_12">
        <h1>
            <img src="images/logo.png" alt="Logo alt">        </h1>
        <div class="socials">
        <a href="www.facebook.com" class="fa fa-facebook"></a>        </div>
        <div class="navigation ">
          <nav>
            <ul class="sf-menu">
			 <li><a href="index.html">Home</a></li>
             <li><a href="about.html">About</a></li>
             <li><a href="gallery.html">Gallery</a></li>
             <li><a href="services.html">services</a></li>
             <li><a href="contacts.html">Contacts</a></li>
			 <li ><a href="log.html">Login</a></li>
			 <li><a href="admlog.html">Admin/Manager</a></li>
           </ul>
          </nav>
          <div class="clear"></div>
        </div>       
      </div>
    </div>
  </div>
</header>
<!--==========================
           content
==============================-->
<div class="container">
    <selection id="content">
      <form action="#">
   <h3 align="center">EVENT DETAILS</h3> 
   <table align="center">
    <td> Event Name </td>
    <td><select name="select">
      <option>wedding</option>
      <option>birthday party</option>
      <option>Engagement</option>
      <option>corparate functions</option>
      <option>Rception</option>
      <option>family functions</option>
    </select></td>
  <tr>
    <td rowspan="2">Date&Time</td>
    <td> from
      <input type="text" value="mm/dd/yyyy" />
      <input type="text" value="--:-- --" />
      <input type="text" value="mm/dd/yyyy" /></td>
  </tr>
  <tr>
    <td> to </td>
  </tr>
  <tr>
    <td rowspan="3">Venue</td>
    <td></td>
  </tr>
  <tr> District
    <select name="select2">
      <option> ...SELECT... </option>
    </select>
  </tr>
  <tr>
    <td> Locality      
      <select name="select3">
        <option> ...SELECT... </option>
      </select>
      <select name="select4">
        <option> ...SELECT... </option>
      </select></td>
  </tr>
    <td></td>
    <td></td>
  <tr>
    <td> Auditorium      </td>
  </tr>
    <td rowspan="2"> Food </td>
    <td><input type="radio" />
      Veg</td>
  <tr>
    <td> breakfast
      <select name="select2">
        <option> ...SELECT... </option>
      </select>
      lunch
      <select name="select2">
        <option> ...SELECT... </option>
      </select>
      dinner
      <select name="select2">
        <option> ...SELECT... </option>
      </select></td>
  </tr>
    <td></td>
    <td><input type="radio" />
      Non Veg</td>
  <tr>
    <td></td>
    <td> breakfast
      <select name="select2">
        <option> ...SELECT... </option>
      </select>
      lunch
      <select name="select2">
        <option> ...SELECT... </option>
      </select>
      dinner
      <select name="select2">
        <option> ...SELECT... </option>
      </select></td>
  </tr>
  <tr>
    <td>Services </td>
    <td> Bus
      <select name="select2">
        <option> ...SELECT... </option>
      </select>
      Car
      <select name="select2">
        <option> ...SELECT... </option>
      </select></td>
  </tr>
  <tr>
    <td rowspan"2">Entertainment </td>
    <td> programs
      <select name="select2">
        <option> ...SELECT... </option>
      </select>
      Group
      <select name="select2">
        <option> ...SELECT... </option>
      </select></td>
  </tr>
   </table>
   </form>
</div>
<!--=============================
              footer
=================================-->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="grid_12"> 
        <div class="copyright">< <class="f_logo"><img src="images/f_logo.png" alt=""> &copy; 
		<span id="copyright-year"></span>Privacy Policy
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


 </body>
</html>