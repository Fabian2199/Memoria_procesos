cont =0;
function contador() {
    var contador = document.getElementById("contador");
    contador.value = cont;
    cont++;
}
setInterval('contador()',1000);