function fn_ValForm(){

    var nama = document.getElementById("nama").value;
    var email = document.getElementById("email").value;
    var umur = document.getElementById("umur").value;
    var kategori = document.getElementById("kategori").value;

    var sMsg = "";
    var info = "";
    var pilihan = "";

    if(nama == ""){
        sMsg += "\n- Nama wajib diisi";
    }

    if(email == ""){
        sMsg += "\n- Email wajib diisi";
    }

    if(umur == ""){
        sMsg += "\n- Umur wajib diisi";
    }

    if(kategori == ""){
        sMsg += "\n- Pilihan lomba wajib dipilih";
    }

    var regEmail =
    /^[a-z0-9][a-z0-9_\.-]*[a-z0-9]@[a-z0-9][a-z0-9_\.-]*[a-z0-9]\.[a-z0-9]{2,4}$/;

    if(email != "" && !regEmail.test(email)){
        sMsg += "\n- Format email tidak valid";
    }

    if(umur != ""){
        if(isNaN(umur)){
            sMsg += "\n- Umur harus angka";
        }
        else if(umur < 10 || umur > 18){
            sMsg += "\n- Umur harus antara 10 sampai 18 tahun";
        }
        else{
            if(umur <= 14){
                info = "Kategori Junior";
            }else{
                info = "Kategori Senior";
            }
        }
    }

    if(sMsg != ""){
        alert("Peringatan:" + sMsg);
        return false;
    }

    switch(kategori){
        case "C":
            pilihan = "Cerdas Cermat";
            break;

        case "P":
            pilihan = "Puisi";
            break;

        case "D":
            pilihan = "Desain Poster";
            break;
    }

    alert(
        "Terima kasih " + nama +
        "! Anda terdaftar di lomba " +
        pilihan + " (" + info + ")."
    );

    return true;
}