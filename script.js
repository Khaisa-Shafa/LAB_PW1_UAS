//AMBIL INI SEBAGAI REFRENSI GANTI TEMA

const tomboltema= document.querySelectorAll('.btn[type="tema"]')
const divIsi= document.querySelector(".isi")
const bodi= document.getElementsByClassName("penjelasan")[0]
const head= document.getElementsByClassName("headline")[0]
const head1= document.getElementsByClassName("headline")[1]
//mendeklarasikan bagian yang akan berganti warna

let tema=0  //tema pink

function GantiTema(){
    if (tema===0){//jika tema pink, ganti ke tema hitam
        tema=1;
        divIsi.style.backgroundColor= "rgb(40, 40, 40)";
        head.style.color="rgb(255, 225, 225)";
        head1.style.color="rgb(255, 225, 225)";
        bodi.style.color="rgb(255, 225, 225)";
    }
    else{ //jika tema hitam ganti ke tema pink
        tema=0;
        divIsi.style.backgroundColor= "rgb(255, 225, 225)";
        head.style.color="rgb(40, 40, 40)";
        head1.style.color="rgb(40, 40, 40)";
        bodi.style.color="rgb(40, 40, 40)";
    }
}

//selalu jalankan fungsi setiap tombol ditekan
for (let i = 0; i < tomboltema.length; i++) 
{
    tomboltema[i].addEventListener
    ("click", function()
    {
        GantiTema();
    }
    )
}