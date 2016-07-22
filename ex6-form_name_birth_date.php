<?php
/*Задача 6:Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе име, 
фамилия и да избере дата на раждане (ден, месец,година). Ако потребителя не е въвел някое
поле, нека въведената от него стойност да се запази във формата.*/

function validateRequired($value) {
	if (!is_string($value)) {
		return !empty($value);
	}
	return mb_strlen($value, 'UTF-8') > 0;
}

function validateString($value) {
	return gettype($value) === 'string';
}

function validateLongerOrEqualString($value, $len) {
	if (is_array($value) || is_object($value)) {
		return false;
	}
	return mb_strlen(strval($value), 'UTF-8') >= $len;
}

function validateNonAlphanumeric($value) {
	if (is_array($value) || is_object($value)) {
		return false;
	}
	return (bool)preg_match('/[^a-z0-9]/i', trim($value));
}

function validateBirthDate($value){
	$arr = explode("/" , $value);
	if (count($arr) != 3){
		return false;
	}else{
		if(strlen($arr[0]) != 2 || strlen($arr[1]) != 2 || strlen($arr[2]) != 4){
			return false;
		}
	}
	return true;
}

$firstname = empty($_POST['firstname']) ? '' : $_POST['firstname'];

$surname = empty($_POST['surname']) ? '' : $_POST['surname'];

$birth = empty($_POST['birth']) ? '' : $_POST['birth'];

$validationErrors = [];

if (!empty($_POST)) {
	validateForm($validationErrors);
}

function validateForm(&$errors) {
	global $firstname, $surname, $birth;
	$errors = [];

	foreach (['firstname', 'surname', 'birth'] as $key => $value) {
		if (!validateRequired($$value)) {
			$errors[$value][] = 'The field is required';
		}
		if (!validateString($$value)) {
			$errors[$value][] = 'The value of this field must be string';
		}
	}

	if (!validateLongerOrEqualString($firstname, 2)) {
		$errors['firstname'][] = 'Username must be at least 2 characters long';
	}
	if (!validateLongerOrEqualString($surname, 2)) {
		$errors['surname'][] = 'Surname must be at least 2 characters long';
	}
	if (!validateBirthDate($birth)){
		$errors['birth'][] = 'Wrong format';
	}
	
	return empty($errors);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Task 6</title>
		<style type="text/css">
			body {
			font-style: italic;
		}
		
		form {
			display: inline-block;
			border: 1px solid gray;
			padding: 1em;
			border-radius: 1.5em;
			
		}
		
		form > div {
			padding: 0.5em 0.3em;
		
		}
		
		[for] {
			display: inline-block;
			width: 150px;
			text-align: left;
		}
	
		button {
			border-radius: 5px;
			/* display: block;
			margin: 0 auto; */
		}
		
		button:hover {
			font-style: italic;
			font-weight: bold;
		}	
		
		.errors {
			color: red;
		}
		
		</style>
	</head>
	<body>
		<form action="" method="post">
			<div>
				<label for="firstname">Firstname: </label>
				<input type="text" name="firstname" id="firstname" placeholder=" at least 2 chars long"
				value="<?= htmlentities($firstname, ENT_QUOTES, 'UTF-8'); ?>"/>
				
				<?php if (!empty($validationErrors['firstname'])): ?>
				<div class="errors">
					<?php foreach ($validationErrors['firstname'] as $e): ?>
					<p><?= htmlspecialchars($e); ?></p>
					<?php endforeach;?>
				</div>
				<?php endif;?>
			</div>
			
			<div>
				<label for="surname">Surname: </label>
				<input type="text" name="surname" id="surname" placeholder=" at least 2 chars long"
				value="<?= htmlentities($surname, ENT_QUOTES, 'UTF-8'); ?>"/>
				
				<?php if (!empty($validationErrors['surname'])): ?>
				<div class="errors">
					<?php foreach ($validationErrors['surname'] as $e): ?>
					<p><?= htmlspecialchars($e); ?></p>
					<?php endforeach;?>
				</div>
				<?php endif;?>
			</div>
			
			<div>
				<label for="birth">Birth Date: </label>
				<input type="text" name="birth" id="birth" placeholder=" dd/mm/yyyy"
				value="<?= htmlentities($birth, ENT_QUOTES, 'UTF-8'); ?>"/>
				
				<?php if (!empty($validationErrors['birth'])): ?>
				<div class="errors">
					<?php foreach ($validationErrors['birth'] as $e): ?>
					<p><?= htmlspecialchars($e); ?></p>
					<?php endforeach;?>
				</div>
				<?php endif;?>
			</div>
			
			
			<button type="submit">Submit</button>
		</form>
	</body>
</html>