var countI = document.getElementById("contI");
var limiteCont = document.getElementById("limiteCont");
var totalDeForms = limiteCont.value - countI.value;

function ingresoDeRenta1() {
    var ingresosMensuales1 = document.getElementById("ingresosMensuales1");
    var deducibles1 = document.getElementById("deducibles1");
    var ingresosNetos1 = document.getElementById("ingresosNetos1");
    var ingresoRenta1 = document.getElementById("ingresoRenta1"); //Esta mierda es el 30 % de ingresos mensuales
    var estatusV1 = document.getElementById("estatusV1");
    var renta1 = document.getElementById("renta1");

    ingresosNetos1.value = ingresosMensuales1.value - deducibles1.value;

    ingresoRenta1.value = ingresosNetos1.value * .30;

    if (ingresosNetos1.value >= renta1.value) {
        estatusV1.value = "Aceptado";
    } else if (ingresosNetos1.value <= renta1.value) {
        estatusV1.value = "Rechazado";
    }
}

function ingresoDeRenta2() {
    var ingresosMensuales2 = document.getElementById("ingresosMensuales2");
    var deducibles2 = document.getElementById("deducibles2");
    var ingresosNetos2 = document.getElementById("ingresosNetos2");
    var ingresoRenta2 = document.getElementById("ingresoRenta2");
    var estatusV2 = document.getElementById("estatusV2");
    var renta2 = document.getElementById("renta2");

    ingresosNetos2.value = ingresosMensuales2.value - deducibles2.value;

    ingresoRenta2.value = ingresosNetos2.value * .30;

    var rentaMensual2 = renta2.value;

    if (ingresosMensuales2 > rentaMensual2) {
        estatusV2.value = "Aceptado";
    } else if (ingresosMensuales2 < rentaMensual2) {
        estatusV2.value = "Rechazado";
    }

}

function ingresoDeRenta3() {
    var ingresosMensuales3 = document.getElementById("ingresosMensuales3");
    var deducibles3 = document.getElementById("deducibles3");
    var ingresosNetos3 = document.getElementById("ingresosNetos3");
    var ingresoRenta3 = document.getElementById("ingresoRenta3");
    var estatusV3 = document.getElementById("estatusV3");
    var renta3 = document.getElementById("renta3");

    ingresosNetos3.value = ingresosMensuales3.value - deducibles3.value;

    ingresoRenta3.value = ingresosNetos3.value * .30;

    var rentaMensual3 = renta3.value;

    if (ingresosMensuales3 > rentaMensual3) {
        estatusV3.value = "Aceptado";
    } else if (ingresosMensuales3 < rentaMensual3) {
        estatusV3.value = "Rechazado";
    }
}

function ingresoDeRenta4() {
    var ingresosMensuales4 = document.getElementById("ingresosMensuales4");
    var deducibles4 = document.getElementById("deducibles4");
    var ingresosNetos4 = document.getElementById("ingresosNetos4");
    var ingresoRenta4 = document.getElementById("ingresoRenta4");
    var estatusV4 = document.getElementById("estatusV4");
    var renta4 = document.getElementById("renta4");

    ingresosNetos4.value = ingresosMensuales4.value - deducibles4.value;

    ingresoRenta4.value = ingresosNetos4.value * .30;

    var rentaMensual4 = renta4.value;

    if (ingresosMensuales4 > rentaMensual4) {
        estatusV4.value = "Aceptado";
    } else if (ingresosMensuales4 < rentaMensual4) {
        estatusV4.value = "Rechazado";
    }

}

function ingresoDeRenta5() {
    var ingresosMensuales5 = document.getElementById("ingresosMensuales5");
    var deducibles5 = document.getElementById("deducibles5");
    var ingresosNetos5 = document.getElementById("ingresosNetos5");
    var ingresoRenta5 = document.getElementById("ingresoRenta5");
    var estatusV5 = document.getElementById("estatusV5");
    var renta5 = document.getElementById("renta5");

    ingresosNetos5.value = ingresosMensuales5.value - deducibles5.value;

    ingresoRenta5.value = ingresosNetos5.value * .30;

    var rentaMensual5 = renta5.value;

    if (ingresosMensuales5 > rentaMensual5) {
        estatusV5.value = "Aceptado";
    } else if (ingresosMensuales5 < rentaMensual5) {
        estatusV5.value = "Rechazado";
    }
}

function ingresoDeRenta6() {
    var ingresosMensuales6 = document.getElementById("ingresosMensuales6");
    var deducibles6 = document.getElementById("deducibles6");
    var ingresosNetos6 = document.getElementById("ingresosNetos6");
    var ingresoRenta6 = document.getElementById("ingresoRenta6");
    var estatusV6 = document.getElementById("estatusV6");
    var renta6 = document.getElementById("renta6");

    ingresosNetos6.value = ingresosMensuales6.value - deducibles6.value;

    ingresoRenta6.value = ingresosNetos6.value * .30;

    var rentaMensual6 = renta6.value;

    if (ingresosMensuales6 > rentaMensual6) {
        estatusV6.value = "Aceptado";
    } else if (ingresosMensuales6 < rentaMensual6) {
        estatusV6.value = "Rechazado";
    }
}