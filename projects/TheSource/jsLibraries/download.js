function exportSaveData(saveData) {
    var data = saveData;
    var json = JSON.stringify(data);
    var blob = new Blob([json], {
        type: "application/json"
    });
    var a = document.createElement("a"),
        url = URL.createObjectURL(blob);
    a.href = url;
    a.download = "saveData.json";
    document.body.appendChild(a);
    a.click();
    setTimeout(function () {
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
    }, 0);
}

function loadFile() {
    var input, file, fr;
    file = input.files[0];
    fr = new FileReader();
    fr.onload = receivedText;
    fr.readAsText(file);
}

function receivedText(e) {
    let lines = e.target.result;
    var newArr = JSON.parse(lines);
}