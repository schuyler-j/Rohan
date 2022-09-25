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

var bg = ['images/home_banner.png', 'images/home_banner_2.png'];
function BackgroundRefresh() {
    num = Math.floor(Math.random()*bg.length);
    const menu_cont = document.getElementById("mc");

    menu_cont.setAttribute('style', 'background-image: url('+(bg[num])+')');
}

BackgroundRefresh();