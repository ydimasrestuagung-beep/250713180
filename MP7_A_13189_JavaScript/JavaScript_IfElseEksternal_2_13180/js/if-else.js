var iNilai;
var sHadir;

iNilai = prompt("Masukkan nilai ujian (0-100):", 0);
sHadir = prompt("Kehadiran minimal 75%? (Y)a atau (T)idak", "Y");

if(iNilai >= 75){
    if(sHadir == "Y"){
        alert("Lulus dengan kehadiran memenuhi syarat");
    }else{
        alert("Nilai lulus, tetapi kehadiran kurang");
    }
}else{
    if(sHadir == "Y"){
        alert("Nilai belum cukup, ikuti remedial");
    }else{
        alert("Nilai dan kehadiran belum cukup");
    }
}