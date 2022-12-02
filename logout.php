<?php
session_start();

session_destroy();

header("Location: waka.php");

exit();

?>