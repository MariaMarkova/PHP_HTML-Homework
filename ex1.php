<?php
/*Задача 1:Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе 2 числа и
да избере от лист каква операция иска да изпълни. След това изведете резултата от
неговия избор и въведени стойности. Възможни операции нека да бъдат +, - , *, /.
Направете всички възможни проверки за въведените стойности.*/

	$operation = empty($_POST['operation']) ? '' : $_POST['operation'];
	
	$input1 = '';
	$input2 = '';
	$result = '';
	
	if (isset($_POST['input1'])) {
		$input1 = $_POST['input1'];
		
		if (is_numeric($input1) || $input1 == '0') {
			$result = operation($operation, $input1, $input2);
		}else {
			$result = 'Input Must Be numeric.';
		}
	}
	
	if (isset($_POST['input2'])) {
		$input2 = $_POST['input2'];
		
		if (is_numeric($input2) || $input2 == '0') {
			$result = operation($operation, $input1, $input2);
		}else {
			$result = 'Input Must Be numeric.';
		}		
	}
	
	function operation($o, $input1, $input2) {
		if ($o == '+'){
			return $input1 + $input2;
		}else if($o == '-'){
			return $input1 - $input2;
		}else if($o == '*'){
			return $input1 * $input2;
		}else if($o == '/'){
			if($input2 == 0){
				return 'Error';
			}else{
				return $input1 / $input2;
			}
		}else if($o == '%'){
			if($input2 == 0){
				return 'Error';
			}else{
				return $input1 % $input2;
			}			
		}
	}
		
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Task 1</title>
		<style type="text/css">
		
		div {
			padding: 5px;
		}
		input {
			width: 60px;	
			border-radius: 7px;
			text-align: center;	
	 	}
	 	
	 	.input {
	 		display: inline;
	 	}
	 	
	 	button {
			background: transparent;
			border-radius: 7px;
		}
		
		select {
			border-radius: 5px;
			width: 40px;
		}
		
		#result {
			color: red;
		}
				
		</style>
	</head>
	<body>
	
	<form action="" method="post">	
		<div class="input">
			<label for="input1"> A :  </label>
			<input type="text" name="input1" id="input1"
			value="<?= htmlentities($input1, ENT_QUOTES, 'UTF-8'); ?>"/>
		</div>
		
		<div class="input">
			<label for="input2"> B :  </label>
			<input type="text" name="input2" id="input2"
			value="<?= htmlentities($input2, ENT_QUOTES, 'UTF-8'); ?>"/>
		</div>
	
		<div class="input">
			<label for="operation"> Operation : </label>
			<select name="operation">
				<option value="<?= $operation ?>">+</option>
				<option value="<?= $operation ?>">-</option>
				<option>*</option>
				<option>/</option>
				<option>%</option>
			</select>
		</div>
			
		<div id="result">
			<?="Result: " . $result?>			
		</div>
		
		<div>
			<button type="submit">Calculate</button>
		</div>
	</form>
	
	</body>
</html>