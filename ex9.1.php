<?php
/*Задача 9:Създайте 2 PHP страници, които си предават 5 параметъра от едната към другата.
Изпишете тези параметри. Предайте тези параметри по 2 начина - чрез POST и GET заявки.*/

if(isset($_GET) && !empty($_GET)){
	echo "params form ex9.2.php";
	foreach ($_GET as $key => $value){
		echo $key . " -> " . $value . "</br>";
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Task 9.1 POST</title>
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
		<form action="ex9.2.php" method="post">
			<div>
				<input type="text" name="input" placeholder="Input 5 params separated with commas."/>
			</div>
			
			<div>
				<button type="submit">Send</button>
			</div>
		</form>
	</body>
</html>


