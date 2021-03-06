// alert("testing outside file");

$(document).on("click", ".open-editUser", function () {
    var userId = $(this).data('id');
    document.getElementById("passedID").value=userId;
});

function staffValidator(){
    if(document.employeeSignupForm.passwordInput.value.length<8){
        alert("Please input a password longer than 8 characters");
        document.employeeSignupForm.passwordInput.focus();
        return false;
    }
}

