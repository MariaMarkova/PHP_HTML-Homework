<?php

session_start();

$word = $_SESSION['word'];
$char = $_POST['userInput'];
$arrResult = [];
$result = [];

for ($i = 0; $i < strlen($word); $i++){
	if ($word[$i] == $char ){
		$arrResult[] = $i;
		$_SESSION['wordScreen'][$i] = $char;
	}
}

if(empty($arrResult)){
	$result['isAvailable'] = false;
	$result['wrong'] = $char;
}else{
	$result['isAvailable'] = true;
}


$result['position'] = $arrResult;
$result['word'] = $word;
$result['wordScreen'] = $_SESSION['wordScreen'];

echo json_encode($result);

//echo $word;
//echo session_id();

?>