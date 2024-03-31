<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Logowanie</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
</head>
<body>
<div style = "width: 90%; margin: 2em auto;">
	<form class = "pure-form pure-form-stacked"action="<?php print(_APP_URL);?>/app/sec/login.php" method="post">
		<legend style = "font-size: 2em">Zaloguj sie</legend>
		<fieldset>
			<label for="id_login">Login: </label>
			<input id="id_login" type="text" name="login"/><br />
			<label for="id_pass">Haslo: </label>
			<input id="id_pass" type="password" name="pass"><br />
			<input class = "pure-button pure-button-primary" type="submit" value="Zaloguj" />
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

</body>
</html>