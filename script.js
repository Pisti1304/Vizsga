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

    var megnyit_kosar = document.querySelector('.kosardiv');
    var bezar_kosar = document.querySelector('.tartalom_bezar');
    var kosar_lista = document.querySelector('.kosar_lista');
    var kosar_tartalma2 = document.querySelector('.kosar_tartalma2');
    var body = document.querySelector('.kosar_tartalma');
    var vegosszeg = document.querySelector('.vegosszeg');
    var mennyiseg = document.querySelector('.mennyiseg');
    var kosar_urit = document.querySelector('.menu_rendszer_bezar');

    megnyit_kosar.addEventListener('click', ()=>{
        body.style.display = "block";
        
    });

    bezar_kosar.addEventListener('click', ()=>{
        body.style.display = "none";
    });

    let termekek = [
        {
            id: 1,
            nev: 'Csokis fehérje',
            image: 'fenykepek/localgymcsokisfeherje.png',
            ar: 6500
        },
        {
            id: 2,
            nev: 'Kreatin',
            image: 'fenykepek/localgymkreatin.png',
            ar: 6500
        },
        {
            id: 3,
            nev: 'Aminosav',
            image: 'fenykepek/localgymepresfeherje.png',
            ar: 6500
        },
        {
            id: 4,
            nev: 'Fehércsokis Fehérje',
            image: 'fenykepek/localgymfehercsokisfeherje.png',
            ar: 6500
        },
        {
            id: 5,
            nev: 'Epres Fehérje',
            image: 'fenykepek/localgymepresfeherje.png',
            ar: 6500
        },
    ];

    let kosar = []; 

    function initApp(){
        termekek.forEach((value, key) =>{
            let ujdiv = document.createElement('div');
            ujdiv.classList.add('ikon');
            ujdiv.innerHTML = `
            <img src="${value.image}"/>
            <div class="neve">${value.nev}</div>
            <select class="mertekegyseg">
                <option value="500 g">500 g</option>
                <option value="1000 g">1000 g</option>
                <option value="2000 g">2000 g</option>
            </select>
                <div class="ar">${value.ar.toLocaleString()} -,</div>
                <button onclick="kosarba(${key})">Kosárba</button>`;
            kosar_lista.appendChild(ujdiv); 
        })
    }
    initApp()

    window.kosarba = function(key){
        if(kosar[key] == null){
            kosar[key] = JSON.parse(JSON.stringify(termekek[key]));
            kosar[key].mennyiseg = 1;
        }
        kosarfeltolt();
    }

    function kosarfeltolt(){
        kosar_tartalma2.innerHTML = '';
        let count = 0;
        let vegosszeg_ = 0;
        kosar.forEach((value, key)=>{
            vegosszeg_ = vegosszeg_ + value.ar;
            count = count + value.mennyiseg;

            if(value != null){
                let ujdiv = document.createElement('li');
                ujdiv.innerHTML = `
                <div><img src="${value.image}"/></div>
                <div>${value.nev}</div>
                <div>${value.ar.toLocaleString()}</div>
                <div>
                    <button onclick="valtoztat_mennyiseg_minusz(${key}, ${value.mennyiseg - 1})">-</button>
                    <div class="count">${value.mennyiseg} DB</div>
                    <button onclick="valtoztat_mennyiseg_plusz(${key}, ${value.mennyiseg + 1})">+</button>
                    </div>`;
                    kosar_tartalma2.appendChild(ujdiv);
                }
            })
        vegosszeg.innerText = vegosszeg_.toLocaleString();
        mennyiseg.innerText = count;
    }
    
    window.valtoztat_mennyiseg_plusz = function(key, mennyiseg){
        if(mennyiseg == 0){
            delete kosar[key];  
            delete vegosszeg_; 
        }else{
            kosar[key].mennyiseg = mennyiseg;
            kosar[key].ar =  termekek[key].ar + kosar[key].ar;
        }
        kosarfeltolt();
    }

    window.valtoztat_mennyiseg_minusz = function(key, mennyiseg){
        if(mennyiseg == 0){
            delete kosar[key];  
            delete vegosszeg_; 
        }else{
            kosar[key].mennyiseg = mennyiseg;
            kosar[key].ar -=  termekek[key].ar ;
        }
        kosarfeltolt();
    }

    window.kosar_urit = function() {
        kosar = [];  
        kosarfeltolt();    
    }

    const selectedElements = document.querySelectorAll('.mertekegyseg');
    selectedElements.forEach(select => {
        select.addEventListener('change', function (event) {
            const ar = event.target.closest('.ikon').querySelector('.ar');

            let osszeg1 = 6500;
            let osszeg2 = 10000;
            let osszeg3 = 14000;

            if (event.target.value === "500 g") {
                ar.textContent = `${osszeg1.toLocaleString()} -,`;
            } else if (event.target.value === "1000 g") {
                ar.textContent = `${osszeg2.toLocaleString()} -,`;
            } else if (event.target.value === "2000 g") {
                ar.textContent = `${osszeg3.toLocaleString()} -,`;
            }           
        });
    });
}); 