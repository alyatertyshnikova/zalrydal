function checkEmail(email) {
    var error = null;
    var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
    if (email == "") {
        error = "Fill email field";
    }
    if (email.length > 50) {
        error = "Your email too long";
    }
    if (!re.test(email) && (email != "admin")) {
        error = "Please, enter validate email";
    }
    return error;
}

function checkPassword(raw_password) {
    var error = null;
     var re =/[\w_%+!\-]+/g;
    if (raw_password == "") {
        error = "Fill password field";
    }
    if (raw_password.length > 50) {
        error = "Your password too long";
    }
    var found=raw_password.match(re); 
    if(found.length!=1){
        error = "Password can contain only digits, letters and _%+!- symbols";
    }
    return error;
}
function checkName(name) {
    var error = null;
    var re =/[\w_%+!\-]+/g;
    if (name == "") {
        error = "Fill name field";
    }
    if (name.length > 50) {
        error = "Your name too long";
    }
    var found=raw_password.match(re); 
    if(found.length!=1){
        error = "Password can contain only digits, letters and _%+!- symbols";
    }
    return error;
}


