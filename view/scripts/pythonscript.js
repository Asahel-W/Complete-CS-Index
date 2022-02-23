var modules = document.getElementById("Modules");

var getModules = function () {
    var changeDiv = document.getElementById("addModules");
    const xmlhttp = new XMLHttpRequest();
    //xmlhttp.onload = function() {
    //    document.getElementById("txtHint").innerHTML = this.responseText;
    //}
    xmlhttp.open("GET", new URL("http://localhost/Complete-CS-Index/controller/controller.php"));
    xmlhttp.send();
    xmlhttp.onprogress = function (){
        changeDiv.innerHTML = "<h1>Loading</h1>";
    }

    xmlhttp.response.onload = function (){
        changeDiv.innerHTML = "<h1>Opened PHP and JS</h1>";
    }
    
}

modules.addEventListener("click", getModules);