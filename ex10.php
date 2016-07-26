<?php
/*Задача 10:Реализирайте играта бесеница чрез PHP – потребителя въвежда букви в поле и при
изпращане на формата или се модифицира даден текст като _ се заменят с познатата буква или
се добавят картинки – как човече се беси. Да има възможност за започване от начало и за
генериране на нови думи при рестарт.*/

session_start();

$arrWords = ['apple', 'bear', 'bunny', 'panda', 'milk', 'mountain', 'snake', 'squirrel',
		'zebra', 'rabbit', 'raccoon', 'mouse', 'mongoose', 'lizard', 'koala'];

function genarateRandomWord($arr){
	$randomIndex = rand(0, count($arr) - 1);
	return $arr[$randomIndex];
}

$word = genarateRandomWord($arrWords);

$len = strlen($word);
$_SESSION['word']= $word;
$_SESSION['len']= $len;
$_SESSION['wordScreen'] ='';

for ($i = 0; $i < strlen($word); $i++){
	$_SESSION['wordScreen'] .= "*";
}

//echo $word;
//echo session_id();
//print_r($_SESSION);
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Task 10</title>
		
		<link rel="stylesheet" type="text/css" href="assets/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/ex10.css" />
		<script type="text/javascript" src="assets/js/ajax.js"></script>
		
	</head>
	<script type="text/javascript">
		function phpResult(txt) {
			console.log(txt);
			var phpResult = JSON.parse(txt);
			console.log(phpResult);

			if( phpResult.isAvailable){
				document.getElementById('wordV').innerHTML = phpResult.wordScreen;
			}else{
				document.getElementById('cnt').innerHTML = document.getElementById('cnt').innerHTML - 1;

				document.getElementById('triesChars').innerHTML = document.getElementById('triesChars').innerHTML + " " + phpResult.wrong;

				
				if (document.getElementById('cnt').innerHTML <= 0){
					document.getElementById('cnt').innerHTML = 'GAME OVER';

					document.getElementById('wordV').innerHTML = phpResult.word;
// 					alert("Restart game - 5sec!");
// 					setTimeout(function(){ window.location.reload(); }, 5000);
				}
			}
			
		}
		
		function sendLetter() {
			var inputLetter = document.getElementById('input1').value;
			Ajax.request('POST', 'checkLetter.php', true, phpResult, {userInput: inputLetter});
		}

	</script>
	<body>
	<div id="wrapper">
		<header>
			<h2>Hangman</h2>
		</header>
		
		<div id="counter">
			Tries: <span id = "cnt">10</span>&nbsp;&nbsp;&nbsp;
			Letters: <span id = "triesChars"></span>
		</div>
				
		<div id="word">
			<p id="wordV"><?=$_SESSION['wordScreen']; ?></p>
		</div>
		
		<div id="input">
			<input type="text" placeholder="Input one symbol." id="input1"/>
		</div>
		
		<div id="img">
			<img alt="hangman" src="assets/images/images.png" />
		</div>
		
		<div>	
			<button type="submit" onclick="sendLetter()">Send</button>				
			<button type="button" onClick="window.location.reload()">Restart</button>
		</div>
		
	</div>
		
	</body>
</html>