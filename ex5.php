<?php
/*������ 5:�������� HTML �������� � PHP ������, � ����� ������� ������ REQUEST
��������� (POST � GET ). �� ������� ������� ����� � ���������, ����� � �� ������� ��
����� ��� �� ���� ��������� (int, string, �).*/

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