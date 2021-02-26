function staffValidator(){
    if(document.employeeSignupForm.passwordInput.value.length<8){
        alert("Please input a password longer than 8 characters");
        document.employeeSignupForm.passwordInput.focus();
        return false;
    }
}
