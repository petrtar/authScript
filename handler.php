<?

    // запрос информации из базы
if ($_REQUEST['id'] && !$_FILES){
    session_start();
    if($_SESSION['id']==$_REQUEST['id'])
    {
        $userInfo = array(
            login => $_SESSION['login'],
            url => $_SESSION['url']
        );
        echo json_encode($userInfo);
    }
    else  
    {
        echo 'error';
    }
    // загрузка файла
} elseif ($_FILES){
    $id = $_REQUEST['id'];
    $name = $_FILES['avatar']['name'];
    $url = $_SERVER['HTTP_REFERER'] . "avatar/".$name;
    copy($_FILES['avatar']['tmp_name'],"avatar/".basename($name));
    $auth = connectDB('load',$id,$url);
    echo "save";
    // регистрация
} else {
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str,true);
    $authResult = connectDB('set',$json_obj['email'],$json_obj['password']);
    
    echo json_encode($authResult);
}


    // возвращает информаию из БД
function connectDB($method,$val1,$val2){
    include ('dataBase.php');

    $dsn = "mysql:host=$host;dbname=$database;"; 
    $options = array( 
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
    ); 
        // работа с данными из базы
    if ($method == 'set'){
        $pdoSet = new PDO($dsn, $user, $password, $options); 
        $sqlAuth = $pdoSet->prepare("SELECT * FROM auth WHERE login ='$val1' AND login ='$val2'");
        $sqlAuth->execute();
        $result = $sqlAuth->fetch();
        if ($result){
            session_start();
            $_SESSION['login'] = $result['login'];
            $_SESSION['url'] = $result['url'];
            $_SESSION['id'] = $result['id'];
            return array(
                exist => "exist",
                id => $_SESSION['id']
            );
        } else {
            $pdoAuth = new PDO($dsn, $user, $password, $options); 
            $sql = $pdoAuth->prepare("INSERT INTO auth(login, password) VALUES('$val1', '$val2')");
            $sql->execute(); 
            $id = $pdoAuth->lastInsertId();
            return array(
                exist => "auth",
                id => $id
            );
        }
        // работа с файлом
    } elseif ($method == 'load'){
        
        $pdoLoad = new PDO($dsn, $user, $password, $options); 
        $sql = $pdoLoad->prepare("UPDATE auth SET url = '$val2' WHERE id = '$val1'"); 
        $sql->execute(); 
        return;
    }
}


