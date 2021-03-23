// alert("na include ang file");

function validateRegistration(){
    
    // var emails = document.forms["parish-registration-form"]["parishionersemail"].value;

    var password = document.forms["parish-registration-form"]["parishionerspassword"].value;

//  var firstName = document.forms["parish-registration-form"]["parishionersfname"].value;

//  var lastName = document.forms["parish-registration-form"]["parishionersmname"].value;

//  var middleName = document.forms["parish-registration-form"]["parishionerslname"].value;

 // var bday = document.forms["parish-registration-form"]["parishionersbday"].value;

    var contactNum = document.forms["parish-registration-form"]["parishionerscontact"].value;

//    var address = document.forms["parish-registration-form"]["parishionersaddress"].value;
   

    var charChecker = 0;
    var character;
    for(var i=0;i<password.length;i++){
        character = password.charAt(i);
        if(character=='`'||character=='~'||character=='!'||character=='@'||character=='#'||character=='$'||character=='%'||character=='^'){
            charChecker++;
        }
    }
    // if(firstName==""){
    //     alert("please inpt something");
    //     return false;
    // }
    // if(middleName==""){
    //     alert("please inpt something");
    //     return false;
    // }
    // if(lastName==""){
    //     alert("please inpt something");
    //     return false;
    // }
    if(contactNum < 0){
        alert("input a fucking positive number asshole");
        return false;
    }
    if(contactNum.length<10){
        alert("Hey you need to input more numbers fucker");
        return false;
    }
    if(contactNum.length>10){
        alert("the shit you inputted is has more numbers than needed in a cellphone number");
        return false;
    }
    if(password.length<8){
        alert("Need at least 8 characters");
        return false;
    }
    if(charChecker==0){
        alert("Your Password needs a special character like ` ~ ! @ # $ % ^ & * ( ) . ");
        return false;
    }


}