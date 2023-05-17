let data = "JavaScript, JQuery, HTML, HTML5, CSS, CSS3, PHP, SQL, Bases de Datos Relacionales, MongoDB, Android, Canvas, Node.js, Bootstrap, Git, GitHub, C#, C++, Basic, Compatibilidad Cross Platform, Aplicaciones Web Progresivas (PWA), Principios de Seguridad, Programación y Diseño Orientado a Objetos, Web Services (REST/SOAP), APIs, Grunt, Adobe Dreamweaver, Adobe Photoshop, Adobe After Effects, Adobe Premiere Pro, Reaper, Entre otros.";
let skills = data.split(", ");
let i = skills.length;
let constI = skills.length;
while (i--) {
    !/\S/.test(skills[i]) && skills.splice(i, 1);
}

function makeList() {

    let list = document.createElement('div');
    for (let i = 0; i < constI; i++) {
        if (i >= constI / 2) {
            let li = document.createElement('li');
            li.textContent = skills[i];
            list.appendChild(li);
        } else if (i <= constI / 2) {
            let li = document.createElement('li');
            li.textContent = skills[i];
            list.appendChild(li);
        }
    }

    let List = document.querySelector('#list');
    List.appendChild(list);
}

function test2() {

    let x = document.getElementById('skillset').insertRow(0);

    var htmlStr = "<table>";
    for (let i = 0; i < skills.length; i++) {
        htmlStr += "<tr>";
        htmlStr += "<td>" + "<li>" + skills[i] + "</li>" + "</td>";
        htmlStr += "<td>" + "<li>" + skills[i + 1] + "</li>" + "</td>";
        htmlStr += "</tr>";
        i++;
    }
    htmlStr += "</table>"
    let y = x.insertCell(0);
    y.innerHTML = htmlStr;
}