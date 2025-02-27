document.addEventListener("DOMContentLoaded", () => {

    var pass = document.getElementById("password");
    var pass2 = document.getElementById("password2");
    var str = document.getElementById("strength1");
    var str2 = document.getElementById("strength2");

    pass.addEventListener('input', () => {
        if (pass.value.length > 0) {
            pass.style.display = "block";
        }
        else {
            pass2.style.display = "block";
        }
        if (pass.value.length <= 0) {
            pass.style.borderColor = "white";
            pass.style.boxShadow = "none";
            str.style.Color = "white";
            str.style.display = "none";
        }
        else if (pass.value.length < 4) {
            pass.style.borderColor = "red";
            pass.style.color = "red";
            pass.style.boxShadow = "0px 2px 10px -1px red";
            str.style.color = "red";
            str.innerHTML = "A jelszavad gyenge";
            str.style.display = "block";
        }
        else if (pass.value.length >= 4 && pass.value.length < 8) {
            pass.style.borderColor = "yellow";
            pass.style.color = "yellow";
            pass.style.boxShadow = "0px 2px 10px -1px yellow";
            str.style.color = "yellow";
            str.innerHTML = "A jelszavad közepesen erős";
            str.style.display = "block";
        }
        else if (pass.value.length >= 8) {
            pass.style.borderColor = "rgb(59, 227, 13)";
            pass.style.color = "rgb(59, 227, 13)";
            pass.style.boxShadow = "0px 2px 10px -1px rgb(59, 227, 13)";
            str.style.color = "rgb(59, 227, 13)";
            str.innerHTML = "A jelszavad erős";
            str.style.display = "block";
        }
    })

    pass2.addEventListener('input', () => {
        if (pass2.value.length > 0) {
            pass2.style.display = "block";
        }
        else {
            pass2.style.display = "block";
        }
        if (pass2.value.length <= 0) {
            pass2.style.borderColor = "white";
            pass2.style.boxShadow = "none";
            str2.style.Color = "white";
            str2.style.display = "none";
        }
        else if (pass2.value.length < 4) {
            pass2.style.borderColor = "red";
            pass2.style.color = "red";
            pass2.style.boxShadow = "0px 2px 10px -1px red";
            str2.style.color = "red";
            str2.innerHTML = "A jelszavad gyenge";
            str2.style.display = "block";
        }
        else if (pass2.value.length >= 4 && pass2.value.length < 8) {
            pass2.style.borderColor = "yellow";
            pass2.style.color = "yellow";
            pass2.style.boxShadow = "0px 2px 10px -1px yellow";
            str2.style.color = "yellow";
            str2.innerHTML = "A jelszavad közepesen erős";
            str2.style.display = "block";
        }
        else if (pass2.value.length >= 8) {
            pass2.style.borderColor = "rgb(59, 227, 13)";
            pass2.style.color = "rgb(59, 227, 13)";
            pass2.style.boxShadow = "0px 2px 10px -1px rgb(59, 227, 13)";
            str2.style.color = "rgb(59, 227, 13)";
            str2.innerHTML = "A jelszavad erős";
            str2.style.display = "block";
        }
    })

    var button = document.getElementById("gomb").onclick = function () {
        var pass = document.getElementById('password').value;
        var pass2 = document.getElementById('password2').value;

        if (pass == "") {
            alert("Nem lehet üres a jelszó mező");
        }
        else if (pass2 == "") {
            alert("Nem adtad meg kétszer a jelszavad");
        }
        else if (pass == pass2) {
            alert("Sikeres regisztráció!");
            return true;
        }
        else if (pass != pass2) {
            alert("A jelszavak nem ugyanazok!");
            return false;
        }
    };


    /*BEJELENTKEZÉS VAGY REGISZTRÁCIÓ*/

    document.getElementById("bejelentkezes").onclick = function () {
        var kontent2 = document.getElementById("kontent2");
        var kontent3 = document.getElementById("kontent3");
        kontent2.style.display = "none";
        kontent3.style.display = "block";

        kontent3.classList.remove('start-animation');
        void kontent3.offsetWidth;
        kontent3.classList.add('start-animation');
    };

    document.getElementById("regisztracio").onclick = function () {
        var kontent2 = document.getElementById("kontent2");
        var kontent3 = document.getElementById("kontent3");
        kontent3.style.display = "none";
        kontent2.style.display = "block";


        kontent2.classList.remove('start-animation');
        void kontent2.offsetWidth;
        kontent2.classList.add('start-animation');
    }; 


    document.getElementById("regisztracio").onclick = function () {      
        var szoveg = document.getElementById("szoveg");
            kontent2.style.display = "none";
            szoveg.style.display = "block";


    

    };
})
 





