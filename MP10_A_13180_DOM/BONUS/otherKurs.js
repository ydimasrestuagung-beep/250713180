function gantiInfo(kode, warnaBg, deskripsi) {
    var kartu = document.getElementById("kartuMataUang");
    var log = document.getElementById("logAtribut");

    kartu.firstChild.data = deskripsi;
    kartu.style.backgroundColor = warnaBg;

    kartu.setAttribute("data-aktif", kode);

    var nilaiAktif = kartu.getAttribute("data-aktif");

    log.firstChild.data = "Kode Aktif: " + nilaiAktif;
}