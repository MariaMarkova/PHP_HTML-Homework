<?php
/*Задача 2:Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе username
и 2 пароли. Проверете дали двете пароли съвпадат и след това ги криптирайте.Изпишете след това 
username и криптираната парола. Направете всички възможни проверки за въведените стойности.*/

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
	
// 	function validateNonAlphanumeric($value) {
// 		if (is_array($value) || is_object($value)) {
// 			return false;
// 		}
// 		return (bool)preg_match('/[^a-z0-9]/i', trim($value));
// 	}
	
	$username = empty($_POST['username']) ? '' : $_POST['username'];
	
	$password = empty($_POST['pass']) ? '' : $_POST['pass'];
	
	$repeatPassword = empty($_POST['re-pass']) ? '' : $_POST['re-pass'];
	
	$validationErrors = [];
	
	if (!empty($_POST)) {
		validateForm($validationErrors);
	}
	
	function validateForm(&$errors) {
		global $username, $password, $repeatPassword;
		$errors = [];
	
		foreach (['username', 'password', 'repeatPassword'] as $key => $value) {
			if (!validateRequired($$value)) {
				$errors[$value][] = 'The field is required';
			}
			if (!validateString($$value)) {
				$errors[$value][] = 'The value of this field must be string';
			}
		}
	
		if (!validateLongerOrEqualString($username, 4)) {
			$errors['username'][] = 'Usrename must be at least 4 characters long';
		}
		if (!validateLongerOrEqualString($password, 5)) {
			$errors['pass'][] = 'Password must be at least 5 characters long';
		}
// 		if (!validateNonAlphanumeric($password)) {
// 			$errors['pass'][] = 'Password must contain at least one non alphanumeric character';
// 		}
		if(strcmp($password, $repeatPassword) != 0){
			$errors['pass'][] = 'Password must be the same';
		} 
		return empty($errors);
	}
	
	function correctForm($errors){
		global $username, $password;
		$html = '';
		if(empty($errors)){
			$html = "<p>Your username is: $username</p>
			<p>and your hashed password is: $password</p>";
		}
		return $html;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Task 2</title>
	</head>
	<body>
	
	<form action="" method="post">	
		<div class="input">
			<label for="username"> username :  </label>
			<input type="text" name="username" id="username"
			value="<?= htmlentities($username, ENT_QUOTES, 'UTF-8'); ?>"/>
			
			<?php if (!empty($validationErrors['username'])): ?>
				<div class="errors">
					<?php foreach ($validationErrors['username'] as $e): ?>
					<p><?= htmlspecialchars($e); ?></p>
					<?php endforeach;?>
				</div>
			<?php endif;?>
		</div>
		
		<div class="input">
			<label for="pass"> password :  </label>
			<input type="password" name="pass" id="pass"
			value="<?= htmlentities($password, ENT_QUOTES, 'UTF-8'); ?>"/>
			
			<?php if (!empty($validationErrors['pass'])): ?>
				<div class="errors">
					<?php foreach ($validationErrors['pass'] as $e): ?>
					<p><?= htmlspecialchars($e); ?></p>
					<?php endforeach;?>
				</div>
			<?php endif;?>
		</div>
		
		<div class="input">
			<label for="re-pass"> repeat password :  </label>
			<input type="password" name="re-pass" id="re-pass"
			value="<?= htmlentities($repeatPassword, ENT_QUOTES, 'UTF-8'); ?>"/>
			
			<?php if (!empty($validationErrors['re-pass'])): ?>
				<div class="errors">
					<?php foreach ($validationErrors['re-pass'] as $e): ?>
					<p><?= htmlspecialchars($e); ?></p>
					<?php endforeach;?>
				</div>
			<?php endif;?>
		</div>
		<div>
			<button type="submit">Submit</button>
		</div>
	</form>
	
	<?php if ($_POST) :?>
		<?= correctForm($validationErrors) ?>
	<?php endif; ?>

	</body>
</html>