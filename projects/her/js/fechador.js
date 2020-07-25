var inicioVigencia = document.getElementById("vigenciaInicio");
var finalVigencia = document.getElementById("vigenciaFinal");

var hoy = new Date();
var fechaHoy;

if (inicioVigencia.value == "") {
    fechaHoy = hoy.getFullYear() + '-' + ('0' + (hoy.getMonth() + 1)).slice(-2) + '-' + ('0' + hoy.getDate()).slice(-2);
    inicioVigencia.value = fechaHoy;
    evaluate(fechaHoy);
} else {
    fechaHoy = inicioVigencia.value;
    evaluate(fechaHoy);
}

function evaluate(fechaHoy) {

    var fechaInicioStr = fechaHoy.toString();
    var fechaInicioSplit = fechaInicioStr.split('-');
    var añoInicio = fechaInicioSplit[0];

    var dia = fechaInicioSplit[2];
    var diaMenosUno = parseInt(dia) - 1;

    var añoFinal = parseInt(añoInicio) + 1;
    var fechaFinalArr = fechaInicioSplit;
    fechaFinalArr[0] = añoFinal.toString();
    fechaFinalArr[2] = diaMenosUno.toString();


    var finVigencia = fechaFinalArr[0] + '-' + ('0' + (fechaFinalArr[1])).slice(-2) + '-' +
        (
            '0' + fechaFinalArr[2]).slice(-2);

    finalVigencia.value = finVigencia;

}

function evaluateOnClick() {
    var inicioVigencia = document.getElementById("vigenciaInicio");
    var finalVigencia = document.getElementById("vigenciaFinal");

    var hoy = new Date();
    var fechaHoy;

    if (inicioVigencia.value == "") {
        fechaHoy = hoy.getFullYear() + '-' + ('0' + (hoy
            .getMonth() + 1)).slice(-2) + '-' + ('0' + hoy.getDate()).slice(-2);
        inicioVigencia.value = fechaHoy;
        evaluate(fechaHoy);
    } else {
        fechaHoy = inicioVigencia.value;
        evaluate(fechaHoy);
    }

    function evaluate(fechaHoy) {

        var fechaInicioStr = fechaHoy.toString();
        var fechaInicioSplit = fechaInicioStr.split('-');
        var añoInicio = fechaInicioSplit[0];
        var dia = fechaInicioSplit[2];
        var diaMenosUno = parseInt(dia) - 1;

        var añoFinal = parseInt(añoInicio) + 1;
        var fechaFinalArr = fechaInicioSplit;
        fechaFinalArr[0] = añoFinal.toString();
        fechaFinalArr[2] = diaMenosUno.toString();

        var finVigencia = fechaFinalArr[0] + '-' + ('0' + (fechaFinalArr[1])).slice(-2) + '-' + ('0' + fechaFinalArr[2]).slice(-2);

        finalVigencia.value = finVigencia;

    }
}