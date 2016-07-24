<?php
/*Задача 9:Създайте 2 PHP страници, които си предават 5 параметъра от едната към другата.
Изпишете тези параметри. Предайте тези параметри по 2 начина - чрез POST и GET заявки.*/ 

$input = '';

if (isset($_POST['input'])){
	$input = $_POST['input'];

	$arr = explode(",", $input);

	if(validateLen($arr)){
		$param1 = $arr[0];
		$param2 = $arr[1];
		$param3 = $arr[2];
		$param4 = $arr[3];
		$param5 = $arr[4];
	}else {
		echo 'Wrong number of params.';
		$param1 = '';
		$param2 = '';
		$param3 = '';
		$param4 = '';
		$param5 = '';
	}

}

function validateLen($array){
	if(count($array) == 5 ){
		return true;
	}else {
		return false;
	}
}



?>

<!DOCTYPE html>
<html>
	<head>
		<title>Task 9.2 GET</title>
		<style type="text/css">
			input {
				width: 250px;
			}
			div{
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<p>Params from ex9.1.php:  <?= " " . $param1 . ", " . $param2 . ", " . $param3 . ", " 
		. $param4 . ", " . $param5 ?></p>
		
		<form action="ex9.1.php" method="get">
			<div>
				<input type="text" name="input" placeholder="Input 5 params separated with commas."/>
			</div>
			
			<div>
				<button type="submit">Send params to ex9.1.php</button>
			</div>
			
		</form>
	</body>
</html>