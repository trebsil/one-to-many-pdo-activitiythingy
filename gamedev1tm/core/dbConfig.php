<!-- Database Configuration Code -->
<?php  

$host = "localhost";
$user = "root";
$password = "";
$dbname = "gamedevs";
$dsn = "mysql:host={$host};dbname={$dbname}";
$pdo = new PDO($dsn, $user, $password);

?>