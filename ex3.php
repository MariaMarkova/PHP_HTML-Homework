<?php
/*Задача 3: Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе стойност
в градуси Celsius C и трябва да получи градуси Fahrenheit F.Използвайте формулата
C = ( 5 / 9 ) * (F -32). След това доразширете задачата, като добавите лист, от който потребителя да 
сам да избере дали да конвертира от C към F или от F към C.*/

	$input1 = '';
	$result = '';
		
	if (isset($_POST['input1'])){
		$input1 = $_POST['input1'];
		
		if (is_numeric($input1) || $input1 == '0') {
			if ($_POST['operation'] == 1){
					
				$result = (($input1*9)/5) + 32;
					
			}else if($_POST['operation'] == 2){
					
				$result = (5/9) * ($input1 - 32);
					
			}
		}else{
			$result = 'Input Must Be numeric.';
		}
	}
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Task 3</title>
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
			width: 150px;			
			}
			
			
		</style>
	</head>
	<body>
	
	<form action="" method="post">	
		<div class="input">
			<label for="input1"> Temperature :  </label>
			<input type="text" name="input1" id="input1"
			value="<?= htmlentities($input1, ENT_QUOTES, 'UTF-8'); ?>"/>
		</div>
		
		<div class="input">
			<label for="oparation"> Oparation : </label>
			<select name="operation">
				<option value="1">Celsius to Fahrenheit</option>
				<option value="2">Fahrenheit to Celsius</option>				
			</select>
		</div>
					
		<div id="result">
			<?="Result: " . $result ?>
		</div>
		
		<div>
			<button type="submit">Calculate</button>
		</div>
	</form>
	
	</body>
</html>