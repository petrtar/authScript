<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>Invoice</title>
</head>
<body>
    <div class="container-fluid">
        <form id="form" class="block">
            <h3 id="reg">Регистрация</h3>
            <div class="form-group">
                <label for="exampleInputEmail1">Введите email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Введите пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Введите пароль еще раз</label>
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
            </div>
            <small id="passwordHelpBlock" class="form-text mb-2">
            </small>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        <form id="load"> 
            <div class="form-group block">
                <label for="exampleFormControlFile1">Загрузить аватарку</label>
                <input type="file" class="form-control-file mb-2" id="exampleFormControlFile1">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
        <div id="cabinet" class="block">
            <p id="login"></p>
            <p id="url"></p>
        </div>
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./script/script.js"></script>
</body>

</html>