<?php
session_start();
$id = $_SESSION["id"];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		ANASAYFA | ÖĞRENCİ
	</title>
	<link href="main.css" rel="stylesheet" type="text/css" >
</head>
<body>
<div class="backgroundImage"></div>

<main class="homeContainer">
<nav class="header">
	<div class="logoDiv">
		<img src="assests/logo_new.png" style="
    width: 515px !important;">
	</div>
   
</nav>

<div class="insideContainer">
	<div class="block" onclick="window.location='kitapBulma.php';" style="background-color: #ecded5;border-color: #a97c5d;" >
		<div class="imgDiv">
			<img src="assests/book.png">
		</div>
		<div class="titleDiv">
			<p>kİtap ara </p>
		</div>
	</div>
	<div class="block" onclick="window.location='profilbilgileri.php';" style="background-color: #d8eed8;border-color: #66a367;" >
		<div class="imgDiv">
			<img src="assests/edit.png"/>
		</div>
		<div class="titleDiv">
			<p>profİl bİlgİlerİm </p>
		</div>
	</div>
	<div class="block" onclick="window.location='issuedBooks_student.php';" style="background-color: #abb8cb;border-color: #597399;" >
		<div class="imgDiv">
			<img src="assests/aldiklarim.png"/>
		</div>
		<div class="titleDiv">
			<p>aldığım kİtaplar </p>
		</div>
	</div>
	<div class="block" onclick="window.location='oneri.php';" style="background-color: #cbe7ff;border-color: #67a5e2;" >
		<div class="imgDiv">
			<img src="assests/oneri.png">
		</div>
		<div class="titleDiv">
			<p>önerİ & Şİkayet </p>
		</div>
	</div>






</div>

	




</main>



</body>
</html>