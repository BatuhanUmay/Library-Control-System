<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		ANASAYFA | ÖĞRENCİ
	</title>
	<link href="main.css" rel="stylesheet" type="text/css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<?php include("header.php"); ?>
<div class="backgroundImage"></div>

<main class="homeContainer">


<div class="insideContainer">
	<div class="block" onclick="window.location='kitapBulma.php';" style="background-color: #ecded5;border-color: #a97c5d;" >
		<div class="imgDiv">
			<img src="assests/book.png">
		</div>
		<div class="titleDiv">
        <p>kitaplar</p>
		</div>
	</div>
	<div class="block" onclick="window.location='author.php';" style="background-color: #e1f8f6; border-color: #247a76;" >
		<div class="imgDiv">
			<img src="assests/author.png"/>
		</div>
		<div class="titleDiv">
        <p>yazarlar</p>
		</div>
	</div>
	<div class="block" onclick="window.location='kategori.php';" style="background-color: #ffe3be;border-color: #d9a85b;" >
		<div class="imgDiv">
			<img src="assests/category.png"/>
		</div>
		<div class="titleDiv">
        <p>kategoriler</p>
		</div>
	</div>
	<div class="block" onclick="window.location='students.php';" style="background-color: #d8eed8;border-color: #66a367;" >
		<div class="imgDiv">
			<img src="assests/edit.png"/>
		</div>
		<div class="titleDiv">
        <p>ögrenciler</p>
		</div>
	</div>
	<div class="block" onclick="window.location='oneriadmin.php';" style="background-color: #abb8cb;border-color: #597399;" >
		<div class="imgDiv">
			<img src="assests/aldiklarim.png"/>
		</div>
		<div class="titleDiv">
        <p>öneri ve sikayetler</p>
		</div>
	</div>
	<div class="block" onclick="window.location='issuedBooks.php';" style="background-color: #cbe7ff;border-color: #67a5e2;" >
		<div class="imgDiv">
			<img src="assests/oneri.png">
		</div>
		<div class="titleDiv">
        <p>alınan kitaplar</p>
		</div>
	</div>






</div>

	




</main>



</body>
</html>