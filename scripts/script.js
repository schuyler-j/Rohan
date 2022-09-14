var b = 0;
function ShowPassword() {
    const password = document.getElementById("pword");
    if(b == 0){
        password.setAttribute('type', 'text');
        b = 1;
    }else{
        password.setAttribute('type', 'password');
        b = 0;
    }

}
