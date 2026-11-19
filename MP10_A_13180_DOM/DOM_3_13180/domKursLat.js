var targetNode;

function init() {
    targetNode = document.getElementById("hasil").firstChild;
}

function hitungKurs(id) {
    var inputEl = document.getElementById(id);
    var hasilUsd = parseFloat(inputEl.value) / 18246;

    targetNode.data = hasilUsd.toFixed(2);

    var li = document.createElement("li");
    var teks = document.createTextNode(
        "Rp" + inputEl.value + " = US$" + hasilUsd.toFixed(2)
    );

    li.appendChild(teks);
    document.getElementById("riwayat").appendChild(li);
}