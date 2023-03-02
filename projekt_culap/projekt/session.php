<?php
session_start();

if(!isset($_SESSION["ulogiran"])){
    header("Location:login.php");
    exit;
}

?>