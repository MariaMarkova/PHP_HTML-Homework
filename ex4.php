<?php
/*Задача 4:Създайте HTML страница с PHP скрипт, вкойто потребителя трябва да въведете 10
числа. След това ги сложете в array,сортирайте ги и ги изпишете сортирани.Намерете
най-малкото и най-голямото число и ги изпишете.*/

$input = '';
$result = '';
$resultArray;

if (isset($_POST['input'])){
	$input = $_POST['input'];

	explodeInput($input);	
}

function explodeInput($str){
	$resultArray = explode(",", $str); 
	
	if(falidateInputLen($resultArray)){
		printSortedArr($resultArray);
	}else {
		$result = 'You must input 10 numbers separated by commas with no space inbetween';
	}
}

function falidateInputLen($array){
	if (count($array) == 10){
		return true;
	}else{		
		return false;
	}
}

function printSortedArr(&$array){
	sort($array);
	$min = $array[0];
	$max = $array[count($array) - 1];
	
	$output = implode(" " , $array);
	
	$result = $output . " " . $min .  " " . $max;
	return $result;
// 	for ($i = 0; $i < count($array); $i++){
// 		echo   $array[$i] . " ";
// 	}	
	
// 	echo PHP_EOL;
// 	echo "max = " . $array[0] . " min = " . $array[count($array) - 1];
}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Task 4</title>
		<style type="text/css">
			input { 
				width: 300px;
			}
			button {
				background-color: transparent;
				border-radius: 5px;
				margin-top: 10px;
				margin-bottom: 10px;
			}
		</style>
	</head>
	<body>
		
		<form action="" method="post">
		
			<div class="input">
				<label for="input"> Please input 10 numbers separated by commas 
				with no space inbetween :  </label>
				<input type="text" name="input" 
				value="<?= htmlentities($input, ENT_QUOTES, 'UTF-8'); ?>"/>
			</div>
		
			<div>
				<button type="submit">Submit</button>
			</div>
		
			<div id="result">
				<?="Sorted Array: " . $result ?>
			</div>
		</form>
	</body>
</html>