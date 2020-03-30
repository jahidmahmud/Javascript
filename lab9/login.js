var attempt = 3; 
function validate(){
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
if ( username == "" && password == ""){
alert ("username and password required");
//window.location = "welcome.html";
return false;
}
else if ( username == "" ){
alert ("username required");
//window.location = "login.html";
return false;
}
else if ( password == "" ){
alert ("password required");
//window.location = "login.html";
return false;
}
else if ( username == "jahid" && password == "12345"){
alert ("Login successfully");
window.location = "welcome.html";
return false;
}
else{
attempt --;
alert("You have left "+attempt+" attempt;");
if( attempt == 0){
document.getElementById("username").disabled = true;
document.getElementById("password").disabled = true;
document.getElementById("submit").disabled = true;
return false;
}
}
}