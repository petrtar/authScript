window.onload = function () { 
    document.getElementById("form").addEventListener('submit', function(e) {
        e.preventDefault();
        var email = document.getElementById("exampleInputEmail1");
        var password = document.getElementById("exampleInputPassword1");
        var message = JSON.stringify({
            "email": email.value,
            "password": password.value
        });
        var req = new XMLHttpRequest();
        req.open('POST', 'handler.php', true); 
        req.setRequestHeader('Content-Type', 'x-www-form-urlencoded');
        
        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                if(req.status == 200){
                    console.log(req.response);
                }
                else {
                    console.log("error");
                }
            }
            };
        req.send(message);
        
    })
}