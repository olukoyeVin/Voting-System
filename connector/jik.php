<?php 
$host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name='iebc';

$connect = mysqli_connect($host,$db_username,$db_password,$db_name);

if(!$connect){
    echo('Database Not Connected');
}
// echo("connected");

?>