<?php
/*Задача 7:Създайте HTML страница с PHP скрипт, в който изписва информация за
browser-a, с който е отворен този скрипт. Нека след това да се изпише информация за сървъра
и за host-a. Коя системна променлива ще използвате, за да извлечете тези информация?*/


// function infoBrowser(){
// 	echo $_SERVER['HTTP_HOST'] . PHP_EOL;
// 	$result = '';
// 	$browser = get_browser();
// 	foreach ($browser as $k => $v){
// 		$result .= $k . " ------ " . $v . "</br>";
		
// 	}
// 	return $result;
// }

function getServerInfo($arr) {
	$html = '';
	foreach ($arr as $key => $value){
		$html .="<li>$key ------ $value</li>";
	}
	return $html;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Task 7</title>
		
	</head>
	<body>
			
		
		
		<ul><?= getServerInfo($_SERVER); ?></ul>
		
	</body>
</html>