document.addEventListener("DOMContentLoaded", () => {

    var pass = document.getElementById("password");
    var pass2 = document.getElementById("password2");
    var str = document.getElementById("strength1");
    var str2 = document.getElementById("strength2");

   /* pass.addEventListener('input', () => {
        if (pass.value.length > 0) {
            pass.style.display = "block";
        } else {
            pass.style.display = "block";
        }
        if (pass.value.length <= 0) {
            pass.style.borderColor = "white";
            str.style.color = "white";
            str.style.display = "none";
        } else if (pass.value.length < 4) {
            pass.style.borderColor = "red";
            str.style.color = "red";
            str.innerHTML = "A jelszavad gyenge";
            str.style.display = "block";
        } else if (pass.value.length >= 4 && pass.value.length < 8) {
            pass.style.borderColor = "yellow";
            str.style.color = "yellow";
            str.innerHTML = "A jelszavad közepesen erős";
            str.style.display = "block";
        } else if (pass.value.length >= 8) {
            pass.style.borderColor = "rgb(59, 227, 13)";
            str.style.color = "rgb(59, 227, 13)";
            str.innerHTML = "A jelszavad erős";
            str.style.display = "block";
        }
    });

    pass2.addEventListener('input', () => {
        if (pass2.value.length > 0) {
            pass2.style.display = "block";
        } else {
            pass2.style.display = "block";
        }
        if (pass2.value.length <= 0) {
            pass2.style.borderColor = "white";
            str2.style.color = "white";
            str2.style.display = "none";
        } else if (pass2.value.length < 4) {
            pass2.style.borderColor = "red";
            str2.style.color = "red";
            str2.innerHTML = "A jelszavad gyenge";
            str2.style.display = "block";
        } else if (pass2.value.length >= 4 && pass2.value.length < 8) {
            pass2.style.borderColor = "yellow";
            str2.style.color = "yellow";
            str2.innerHTML = "A jelszavad közepesen erős";
            str2.style.display = "block";
        } else if (pass2.value.length >= 8) {
            pass2.style.borderColor = "rgb(59, 227, 13)";
            str2.style.color = "rgb(59, 227, 13)";
            str2.innerHTML = "A jelszavad erős";
            str2.style.display = "block";
        }
    });*/

    var gomb = document.getElementById("gomb");
    if (gomb) {
        gomb.addEventListener('click', function (event) {
            var pass = document.getElementById('password').value;
            var pass2 = document.getElementById('password2').value;

            if (pass == "") {
                alert("Nem lehet üres a jelszó mező");
                event.preventDefault();
            }
            else if (pass2 == "") {
                alert("Nem adtad meg kétszer a jelszavad");
                event.preventDefault();
            }
            else if (pass != pass2) {
                alert("A jelszavak nem ugyanazok!");
                event.preventDefault();
            }
            else {
                alert("Sikeres regisztráció!");
            }
        });
    };




    

    // function betolt(){
    //     document.getElementById("gomb").addEventListener('click', function (event) {
    //         var kontent2 = document.getElementById("kontent2");
    //         var kontent3 = document.getElementById("kontent3");         
    //         kontent2.style.display = "block";
    //         kontent3.style.display = "none";
    //     });
    // }


    document.getElementById("bejelentkezes").onclick = function () {
        var form = document.getElementById("form1");
        var kontent2 = document.getElementById("kontent2");
        var kontent3 = document.getElementById("kontent3");   
        kontent2.style.display = "none";
        kontent3.style.display = "block";

    };

    document.getElementById("regisztracio").onclick = function () {
        var kontent2 = document.getElementById("kontent2");
        var kontent3 = document.getElementById("kontent3");
        kontent3.style.display = "none";
        kontent2.style.display = "block";

    };

    var kivalasztott = document.querySelectorAll('.kivalaszt');
    kivalasztott.forEach(select => {
        select.addEventListener('change', function (event) {
            var ar = event.target.closest('.ikon').querySelector('.ar');

            let osszeg1 = "10.000 FT";
            let osszeg2 = "20.000 FT";
            let osszeg3 = "30.000 FT";

            if (event.target.value === "500 g") {
                ar.textContent = osszeg1;
            }
            else if (event.target.value === "1000 g") {
                ar.textContent = osszeg2;
            }
            else if (event.target.value === "2000 g") {
                ar.textContent = osszeg3;
            }
        });
    });
    
});

