<?php
require_once dirname(__FILE__).'/../../config.php';
// Start sesji
session_start();

// Pobranie roli
$role = isset($_SESSION['user']) ? $_SESSION['user'] : '';

if(empty($role)){
    // Zaloguj, jesli uzytkownik jest niezalogowany
    include _ROOT_PATH.'/app/sec/login.php';
    exit();
}
