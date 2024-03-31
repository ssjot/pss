<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator Kredytowy</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
</head>
<body>
<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/sec/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>
<div style = "width: 90%; margin: 2em auto;">
	<form class = "pure-form pure-form-stacked"action="<?php print(_APP_URL);?>/app/calc.php" method="post">
		<legend style = "font-size: 2em">Kalkulator Kredytowy</legend>
		<fieldset>
			<label for="id_kwota">Kwota: </label>
			<input id="id_kwota" type="text" name="kwota"/><br />
			<label for="id_raty">Ilość Lat: </label>
			<input id="id_raty" type="text" name="raty"><br />
			<label for="id_procent">Oprocentowanie: </label>
			<input id="id_procent" type="text" name="procent"><br />
			<input class = "pure-button pure-button-primary" type="submit" value="Oblicz" />
		</fieldset>
	</form>	
</div>
<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna Rata: '.round($result,2); ?>
</div>
<?php } ?>

</body>
</html>