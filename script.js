document.getElementById("but2").style.visibility = "hidden";

function showContact() {
    document.getElementById("but2").style.visibility = "visible";
    document.getElementById("but").style.visibility = "hidden";
}

document.getElementById("but").style.visibility = "hidden";

function showOverzicht() {
    document.getElementById("but").style.visibility = "visible";
    document.getElementById("but2").style.visibility = "hidden";
}

function log() {
    window.location.replace("/hengelsport/php/login.php");
}
