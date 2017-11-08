var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
}

if(mm<10) {
    mm = '0'+mm
}

today = yyyy + '-' + mm + '-' + dd;


var usermember;
function member() {
    document.getElementById('memberbtn').style.color= "#DEDFDF";
    document.getElementById('memberbtn').style.backgroundColor= "#4C5C6A";
    document.getElementById('trainerbtn').style.color= "#4C5C6A";
    document.getElementById('trainerbtn').style.backgroundColor="transparent";
    document.getElementById('trainerbtn').style.borderStyle="solid";
    document.getElementById('trainerbtn').style.borderColor="4C5C6A";
    document.getElementById("dropdown").style.display ='block';
    document.getElementById("speciality").style.display ='none';
    usermember = true;
}
function trainer() {
    document.getElementById('trainerbtn').style.color= "#DEDFDF";
    document.getElementById('trainerbtn').style.backgroundColor= "#4C5C6A";
    document.getElementById('memberbtn').style.color= "#4C5C6A";
    document.getElementById('memberbtn').style.backgroundColor="transparent";
    document.getElementById('memberbtn').style.borderStyle="solid";
    document.getElementById('memberbtn').style.borderColor="4C5C6A";
    document.getElementById("speciality").style.display ='block';
    document.getElementById("dropdown").style.display ='none';
    usermember = false;
}
function validateForm() {
  var fn = document.forms["signupform"]["fullname"].value;
  var email = document.forms["signupform"]["email"].value;
  atpos = email.indexOf("@");
  dotpos = email.lastIndexOf(".");
  var un = document.forms["signupform"]["username"].value;
  var pw = document.forms["signupform"]["password"].value;
  var pwl = document.forms["signupform"]["password"].value.length;
  var rpw = document.forms["signupform"]["repeatpassword"].value;
  var sp = document.forms["signupform"]["speciality"].value;
  if (fn == "") {
      document.getElementById("fullnameerror").style.display ='block';
      return false;
  }

  if (email == "") {
    document.getElementById("fullnameerror").style.display ='none';
      document.getElementById("emailerror").style.display ='block';
      return false;
  }
  if (atpos < 1 || ( dotpos - atpos < 2 )) {
    document.getElementById("fullnameerror").style.display ='none';
    document.getElementById("emailerror").style.display ='none';
      document.getElementById("emailerror2").style.display ='block';
      return false;
  }
  if (un == "") {
    document.getElementById("fullnameerror").style.display ='none';
    document.getElementById("emailerror").style.display ='none';
    document.getElementById("emailerror2").style.display ='none';
      document.getElementById("usernameerror").style.display ='block';
      return false;
  }
  if (pwl < 6) {
    document.getElementById("fullnameerror").style.display ='none';
    document.getElementById("emailerror").style.display ='none';
    document.getElementById("emailerror2").style.display ='none';
    document.getElementById("usernameerror").style.display ='none';
      document.getElementById("passworderror").style.display ='block';
      return false;
  }
  if (rpw != pw ) {
    document.getElementById("fullnameerror").style.display ='none';
    document.getElementById("emailerror").style.display ='none';
    document.getElementById("emailerror2").style.display ='none';
    document.getElementById("usernameerror").style.display ='none';
    document.getElementById("passworderror").style.display ='none';
      document.getElementById("repeatpassworderror").style.display ='block';
      return false;
  }
  if (usermember == false){
    if (sp == "") {
      document.getElementById("fullnameerror").style.display ='none';
      document.getElementById("emailerror").style.display ='none';
      document.getElementById("emailerror2").style.display ='none';
      document.getElementById("usernameerror").style.display ='none';
      document.getElementById("passworderror").style.display ='none';
      document.getElementById("repeatpassworderror").style.display ='none';
      document.getElementById("specialityerror").style.display ='block';
      return false;
    }
  }
  document.getElementById("fullnameerror").style.display ='none';
  document.getElementById("emailerror").style.display ='none';
  document.getElementById("emailerror2").style.display ='none';
  document.getElementById("usernameerror").style.display ='none';
  document.getElementById("passworderror").style.display ='none';
    document.getElementById("repeatpassworderror").style.display ='none';
    document.getElementById("specialityerror").style.display ='none';
    if(window.confirm("Are you sure you want to sign up?")== true){
      return true;
    }
    else{
      return false;
    }
}
function validateForm2() {
  var email = document.forms["updateform"]["email"].value;
  atpos = email.indexOf("@");
  dotpos = email.lastIndexOf(".");
  var pw = document.forms["updateform"]["password"].value;
  var pwl = document.forms["updateform"]["password"].value.length;
  var rpw = document.forms["updateform"]["repeatpassword"].value;
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
  if(window.confirm("Are you sure you want to update details?")== true){
    return true;
  }
  else{
    return false;
  }
}
function review(value){
  if(value < today){
    document.getElementById("reviewpopup").style.display ='block';
  }
  else{
    alert('Date of the training has not yet passed. Not allowed to review.');
  }
}


function submitreview(){
    var star = document.forms["reviewform"]["star"].value;
    if (star != '1' && star != '2' && star != '3' && star != '4' && star != '5') {
      alert('Please enter a rating to submit');
      return false;
    }
    return true;
}
function updatetitle(){
  document.getElementById("updateTitle").style.display ='block';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateClasstype").style.display ='none';
  document.getElementById("updateMax").style.display ='none';
  document.getElementById("updateNum").style.display ='none';
}
function updatetitle2(){
  document.getElementById("updateTitle").style.display ='block';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateNotes").style.display ='none';
}
function updatedate(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='block';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateClasstype").style.display ='none';
  document.getElementById("updateMax").style.display ='none';
  document.getElementById("updateNum").style.display ='none';
}
function updatedate2(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='block';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateNotes").style.display ='none';
}
function updatetime(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='block';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateClasstype").style.display ='none';
  document.getElementById("updateMax").style.display ='none';
  document.getElementById("updateNum").style.display ='none';
}
function updatetime2(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='block';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateNotes").style.display ='none';
}
function updatefee(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='block';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateClasstype").style.display ='none';
  document.getElementById("updateMax").style.display ='none';
  document.getElementById("updateNum").style.display ='none';
}
function updatefee2(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='block';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateNotes").style.display ='none';
}
function updatestatus(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='block';
  document.getElementById("updateClasstype").style.display ='none';
  document.getElementById("updateMax").style.display ='none';
  document.getElementById("updateNum").style.display ='none';
}
function updatestatus2(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='block';
  document.getElementById("updateNotes").style.display ='none';
}
function updateclasstype(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateClasstype").style.display ='block';
  document.getElementById("updateMax").style.display ='none';
  document.getElementById("updateNum").style.display ='none';
}
function updatemax(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateClasstype").style.display ='none';
  document.getElementById("updateMax").style.display ='block';
  document.getElementById("updateNum").style.display ='none';
}
function updatenum(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateClasstype").style.display ='none';
  document.getElementById("updateMax").style.display ='none';
  document.getElementById("updateNum").style.display ='block';
}
function updatenotes(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateNotes").style.display ='block';
}
function update(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateStatus").style.display ='none';
  document.getElementById("updateClasstype").style.display ='none';
  document.getElementById("updateMax").style.display ='none';
  document.getElementById("updateNum").style.display ='none';
  alert("Your detail has been updated");
}
function update2(){
  document.getElementById("updateTitle").style.display ='none';
  document.getElementById("updateDate").style.display ='none';
  document.getElementById("updateTime").style.display ='none';
  document.getElementById("updateFee").style.display ='none';
  document.getElementById("updateNotes").style.display ='none';
  alert("Your detail has been updated");
}
function validateFormLogIn(){
    window.location="signup.html";
}
function uniqueUsername(){
  document.getElementById("uniqueUsername").style.display = "block";
}
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
