<?

// $host = 'localhost';
// $db = 'co27927_admin3';
// $user = 'co27927_admin3';
// $pass = 'Qwerty123!';

$host = 'mysql-8.2';
$db = 'admin3_db';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
];
    
$pdo = new PDO($dsn, $user, $pass, $options);