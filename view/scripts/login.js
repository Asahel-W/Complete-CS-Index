var createAccount = document.getElementById("login");

var goToLogin = function () {
    console.log("login");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    const xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("POST", new URL("http://localhost/Complete-CS-Index/controller/controller.php"), true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xmlhttp.onreadystatechange = function() {//Call a function when the state changes.
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
        }
    }
    xmlhttp.send("email="+email.value+"&password="+password.value+"&login=true");
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.status == 200 && xmlhttp.readyState == 4){
            console.log(xmlhttp.responseText);
            //var div = document.getElementById("changeDiv");
            //div.innerHTML = "<h1>"+xmlhttp.responseText+"</h1>";
        }
    }
}

createAccount.addEventListener("click", goToLogin);