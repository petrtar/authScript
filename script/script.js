window.onload = function () { 
            // отправка формы
        document.getElementById("form").addEventListener('submit', function(e) {
        e.preventDefault();
        var regEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var regPass = /(?=.*[0-9])(?=.*[a-z]){6,}/g;
        var email = document.getElementById("exampleInputEmail1");
        var password = document.getElementById("exampleInputPassword1");
        var password2 = document.getElementById("exampleInputPassword2");
        var alarm = document.getElementById("passwordHelpBlock");
        if (password.value !== password2.value || !regEmail.test(email.value ) || !regPass.test(password.value )){
            alarm.innerText = "Не правильный логин или пароль";
            return;
        }
        var message = JSON.stringify({
            "email": email.value,
            "password": password.value
        });

        var req = new XMLHttpRequest();
        req.open('POST', 'handler.php', true); 
        req.setRequestHeader('Content-Type', 'x-www-form-urlencoded');
        req.onreadystatechange = function () {
            if (req.status == 200 && req.readyState == 4) {
                var response = JSON.parse(req.response);
                if(response.exist == "exist"){
                    getInfoforUser(response.id);
                    document.getElementById("load").style.display = "none";
                    document.getElementById("form").style.display = "block";
                    document.getElementById("reg").innerText = "Введите пароль и логин еще раз";
                    // window.location.reload();
                } else if (response.exist == "auth") {
                    document.getElementById("load").style.display = "block";
                    document.getElementById("form").style.display = "none";
                    localStorage.setItem('id', response.id);
                }
                
            } 
        };
        req.send(message);
        
    });
        // загрузка файла
    document.getElementById("load").addEventListener('submit', function(e) {
        e.preventDefault();
        var avatar = document.getElementById("exampleFormControlFile1").files[0];
        var id = localStorage.getItem("id");
        let req = new XMLHttpRequest();
        let formData = new FormData();
        formData.append("avatar", avatar);      
        formData.append("id", id);                           
        req.open("POST", 'handler.php',true);
        req.onreadystatechange = function () {
            if (req.status == 200 && req.readyState == 4) {
                document.getElementById("load").style.display = "none";
                document.getElementById("form").style.display = "block";
                document.getElementById("reg").innerText = "Введите пароль и логин еще раз";
            }
        };
        req.send(formData);
    })

        // выводит информацию о пользователе
    function getInfoforUser(sessionId){
        var req = new XMLHttpRequest();
        var params = 'id='+sessionId;
        req.open('POST', 'handler.php', true);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.onreadystatechange = function() {
            if(req.readyState == 4 && req.status == 200) {
                if (req.response == "error"){
                    alert("ошибка авторизации")
                } else {
                    var userInfo = JSON.parse(req.response);
                    document.getElementById("load").style.display = "none";
                    document.getElementById("form").style.display = "none";
                    document.getElementById("cabinet").style.display = "block";
                    document.getElementById("login").innerText = "Ваш логин: "+userInfo.login;
                    document.getElementById("url").innerHTML = "Адрес аватарки: <a href='"+userInfo.url+"' target='_blank'>"+userInfo.url+"</a>";
                }
            }
        }
        req.send(params);
    }

}