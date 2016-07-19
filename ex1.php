<?php
/*Задача 1:Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе 2 числа и
да избере от лист каква операция иска да изпълни. След това изведете резултата от
неговия избор и въведени стойности. Възможни операции нека да бъдат +, - , *, /.
Направете всички възможни проверки за въведените стойности.*/

	$operation = empty($_POST['operation']) ? '' : $_POST['operation'];
	
	$input = '';
	$num2 = '';
	
	if (!empty($_POST['input1'])) {
		$input = $_POST['input1'];
	}
	if (!empty($_POST['input2'])) {
		$num2 = $_POST['input2'];
	}
	
	if ($operation == '+'){
		$result = $input + $num2;
	}else if($operation == '-'){
		$result = $input - $num2;
	}else if($operation == '*'){
		$result = $input * $num2;
	}else if($operation == '/'){
		if($num2 == 0){
			$result = 'Error';
		}else{
			$result = $input / $num2;
		}
	}else if($operation == '%'){
		$result = $input % $num2;
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
			<input type="number" name="input1" id="input1"
			value="<?= htmlentities($input, ENT_QUOTES, 'UTF-8'); ?>"/>
		</div>
		
		<div class="input">
			<label for="input2"> B :  </label>
			<input type="number" name="input2" id="input2"
			value="<?= htmlentities($num2, ENT_QUOTES, 'UTF-8'); ?>"/>
		</div>
	
		<div class="input">
			<label for="oparation"> Oparation : </label>
			<select name="operation">
				<option>+</option>
				<option>-</option>
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