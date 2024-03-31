<?php
require_once dirname(__FILE__).'/../../config.php';

function getCredentials(&$login, &$pass){
    $login = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
    $pass = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
}

function checkCredentials($login, $pass, &$messages){

    if(!(isset($login) && isset($pass))) return false;

    if($login == '') $messages[] = 'Nie wprowadzono loginu';
    if($pass == '') $messages[] = 'Nie wprowadzono hasla';

    if(count($messages) > 0) return false;
    
    if($login == 'admin' && $pass == 'admin'){
        session_start();
        $_SESSION['user'] = 'admin';
        return true;
    }

    $messages[] = 'Niepoprawne dane';
    return false;
}


$login = null;
$pass = '';
$messages = array();

getCredentials($login, $pass);

if(!checkCredentials($login, $pass, $messages))
    include _ROOT_PATH.'/app/sec/login_view.php';
else
    header("Location: "._APP_URL);