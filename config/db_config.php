<?php 
require ('connector/conn/conn1/jik.php');

$myfile = fopen("Details.txt", "w") or die("Unable to open file!");
echo fread($myfile,filesize("Details.txt"));
fclose($myfile);



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>