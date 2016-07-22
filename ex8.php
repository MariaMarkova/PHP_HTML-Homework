<?php
/*Задача 8:Създайте HTML страница с PHP скрипт, в който съдържа HTML форма и
показва на екрана колко пъти тази форма е била изпратена на сървъра.*/

session_start();

$input = '';

if ( isset($_POST['input']) ){
	$input = $_POST['input'];
}

if(!isset($_SESSION)){
	$_SESSION['count'] = 0;
}else{
	$_SESSION['count']++;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Task 8</title>
		<style type="text/css">
		
			div {
				padding: 10px;
			}
		</style>
	</head>
	<body>
		<form action="" method="post">
			<div class="input">
				<label for="input"> Input :  </label>
				<input type="text" name="input" id="input"
				value="<?= htmlentities($input, ENT_QUOTES, 'UTF-8'); ?>"/>
			</div>
		
			<div>
				<button type="submit">Send</button>
			</div>
		</form>
		
		<p><?= "Session count is : " . $_SESSION['count']; ?></p>
		
	</body>
</html>