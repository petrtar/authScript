<?


$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str);

$host = 'localhost'; // адрес сервера 
$database = 'invoice'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

$dsn = "mysql:host=$host;dbname=$database;"; 
$options = array( 
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
); 
$pdo = new PDO($dsn, $user, $password, $options); 
$sql = $pdo->prepare("SELECT * FROM auth"); 
$sql->execute(); 
$auth = $sql->fetchAll();



file_put_contents(realpath(__DIR__) . '/text.log', print_r($auth,true), FILE_APPEND);
