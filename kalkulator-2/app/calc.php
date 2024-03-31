<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

include _ROOT_PATH.'/app/sec/bouncer.php';

// 1. pobranie parametrów
function getParams(&$kwota, &$raty, &$procent){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$raty = isset($_REQUEST['raty']) ? $_REQUEST['raty'] : null;
	$procent = isset($_REQUEST['procent']) ? $_REQUEST ['procent'] : null;
}

// 2. walidacja parametrów

function checkParams(&$kwota, &$raty, &$procent, &$messages){
// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($kwota) && isset($raty) && isset($procent))) {
		//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $kwota == "") {
		$messages [] = 'Nie podano kwoty.';
	}
	if ( $raty == "") {
		$messages [] = 'Nie podano ilosci rat.';
	}
	if ( $procent == "") {
		$messages [] = 'Nie podano oprocentowania.';
	}

	if(count ( $messages ) != 0) return false;
		
	// sprawdzenie, czy $kwota, $raty i $procent są liczbami
	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota nie jest liczbą.';
	}

	if (! is_numeric( $raty )){
		$messages [] = 'Ilość lat nie jest liczbą.';
	}
	
	if (! is_numeric( $procent )) {
		$messages [] = 'Oprocentowanie nie jest liczbą.';
	}

	if(count ( $messages ) != 0) return false;
	else return true;
}

function calcPayment(&$kwota, &$raty, &$procent) {
	
	//konwersja parametrów na double
	$kwota = doubleval($kwota);
	$raty = doubleval($raty);
	$procent = doubleval($procent);
	
	//wykonanie operacji
	return ($kwota/($raty*12))*(1+$procent/100);
}

// Inicjacja zmiennych

$kwota = null;
$raty = null;
$procent = null;
$result = null;
$messages = array();

getParams($kwota, $raty, $procent);
if(checkParams($kwota, $raty, $procent, $messages)){
	$result = calcPayment($kwota, $raty, $procent);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$kwota,$raty,$procent,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';