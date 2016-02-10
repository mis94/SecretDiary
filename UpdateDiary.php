<?php
session_start() ;
include("Connection.php") ;
//echo $_SESSION['id'] ;
$query = "UPDATE users SET diary = '".mysqli_real_escape_string($link, $_POST['diary'])."' WHERE id = '".$_SESSION['id']."' LIMIT 1" ;
mysqli_query($link, $query) ;
?>