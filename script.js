document.addEventListener("DOMContentLoaded", () => {
    var gomb = document.getElementById("gomb");
    if (gomb) {
        gomb.addEventListener('click', function (event) {
            var pass = document.getElementById('password').value;
            var pass2 = document.getElementById('password2').value;
            var email = document.getElementById('email').value;
            var xhr = new XMLHttpRequest();

            xhr.open("POST", "regisztral.php", true);
            xhr.onload = function () {
                if (xhr.responseText.includes("email_exists")) {
                    alert("Ez az e-mail cím már regisztrálva van!");
                    event.preventDefault();
                    return;
                }
                if (pass === "") {
                    alert("Nem lehet üres a jelszó mező");
                    event.preventDefault();
                    return;
                }
                if (pass2 === "") {
                    alert("Nem adtad meg kétszer a jelszavad");
                    event.preventDefault();
                    return;
                }
                if (pass !== pass2) {
                    alert("A jelszavak nem ugyanazok!");
                    event.preventDefault();
                    return;
                }
                alert("Sikeres regisztráció!");
            };
        });
    }

    const menugomb = document.querySelector('.menu-gomb');
    const menubezar = document.querySelector('.zar-reszmenu');
    const legordulomenu = document.querySelector('.legordulo-menu');

    if (menugomb && menubezar && legordulomenu) {
        menugomb.onclick = function () {
            legordulomenu.style.display = "block";
            menugomb.style.display = "none";
            menubezar.style.display = "block";

            menubezar.onclick = function () {
                legordulomenu.style.display = "none";
                menubezar.style.display = "none";
                menugomb.style.display = "block";
                location.reload();
            };
        };
    }

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


