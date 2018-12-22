function validateForm()
{
/* Validating name field */
var x=document.forms["myForm"]["name"].value;
if (x==null || x=="")
 {
 alert("Name must be filled out");
 return false;
 }
/* Validating email field */
var x=document.forms["myForm"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
 {
 alert("Not a valid e-mail address");
 return false;
 }
}