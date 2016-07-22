<?php
/*Задача 5:Създайте HTML страница с PHP скрипт, в който изписва всички REQUEST
параметри (POST и GET ). Да изписва техните имена и стойности, както и да показва от
какъв тип са тези параметри (int, string, …).*/

function getInfo ($array){
	foreach ($array as $key => $value){
		$value = empty($value) ? "empty value" : $value;
		echo "$key with $value with type " .gettype($value);
	}
	
} 

if ($_REQUEST){
	if ($_POST){
		getInfo($_POST);
	}else if ($_GET){
		getInfo($_GET);
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Task 5</title>
	</head>
	<body>
		<form action="" method="post">
			<input type="text" name="input">
			<button type="submit">Submit</button>
		</form>
	</body>
</html>