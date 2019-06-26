window.onload = function () { 
    document.getElementById("form").addEventListener('submit', function(e) {
        e.preventDefault();
        var email = document.getElementById("exampleInputEmail1");
        var password = document.getElementById("exampleInputPassword1");
        console.log(email.value);
        console.log(password.value);
    })
}