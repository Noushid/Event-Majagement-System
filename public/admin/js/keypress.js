document.getElementById('name').oninput = function() {keypress();};
document.getElementById('email').oninput = function() {keypress();};
document.getElementById('comments').oninput = function() {keypress();};

function keypress() {
    
  var inputVal = document.getElementById('name').value;
  if (inputVal === '') {
    document.getElementById('xname').setAttribute('style','opacity:0;transform: translateY(60px);');    
  }
   else if(inputVal){
     document.getElementById('xname').setAttribute('style','opacity:1;transform: translateY(0px);');
   }
  
  var emailVal = document.getElementById('email').value;
  if (emailVal === '') {
    document.getElementById('xemail').setAttribute('style','opacity:0;transform: translateY(60px);');    
  }
   else if(emailVal){
     document.getElementById('xemail').setAttribute('style','opacity:1;transform: translateY(0px);');
   }
  
  var commentsVal = document.getElementById('comments').value;
  if (commentsVal === '') {
    document.getElementById('xcomments').setAttribute('style','opacity:0;transform: translateY(60px);');    
  }
   else if(commentsVal){
     document.getElementById('xcomments').setAttribute('style','opacity:1;transform: translateY(0px);');
   }
}