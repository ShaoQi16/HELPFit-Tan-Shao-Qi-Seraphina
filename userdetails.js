function validateForm() {
  var email = document.forms["signupform"]["email"].value;
  atpos = email.indexOf("@");
  dotpos = email.lastIndexOf(".");
  var pw = document.forms["signupform"]["password"].value;
  var pwl = document.forms["signupform"]["password"].value.length;
  var rpw = document.forms["signupform"]["repeatpassword"].value;
  if(email!=""){
    if (atpos < 1 || ( dotpos - atpos < 2 )) {
        document.getElementById("emailerror2").style.display ='block';
        return false;
    }
  }
  if(pw!=""){
    if (pwl < 6) {
      document.getElementById("emailerror2").style.display ='none';
      document.getElementById("passworderror").style.display ='block';
      return false;
    }
    if (rpw != pw ) {
      document.getElementById("emailerror2").style.display ='none';
      document.getElementById("passworderror").style.display ='none';
      document.getElementById("repeatpassworderror").style.display ='block';
      return false;
    }
  }

  document.getElementById("emailerror2").style.display ='none';
  document.getElementById("passworderror").style.display ='none';
  document.getElementById("repeatpassworderror").style.display ='none';
  alert("Updates on your details have been made.");
  window.location="homepage.html";
  return true;

}
