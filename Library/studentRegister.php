<html>
<head>
	<title>  Form</title>
	<link href="main.css" rel="stylesheet" type="text/css" >
	<link rel="icon" href="https://cutt.ly/0cD3fkS" type="image/x-icon" />

	<style type="text/css">
	body{
   background: linear-gradient(rgba(0,0,0,0.5 ),rgba(0,0,0,0.5)) ,url(assests/backg.jpg);
background-size: cover;
}
	
</style>
</head>
<body>

	<div class="Container">
		<div id="Login" class="Wrapper active">
			<h2 class="headerForm" >ÖGRENCİ ÜYE OL</h2>
			<form action="" method="POST" aciton="" id="Login">
			

			<div class="line">
				<input type="text" placeholder="Ad-Soyad" name="adsoyad"  required>
			</div>
			<div class="line">
				<input type="email" placeholder="E-mail" name="email"  required>
			</div>
			
			<div class="line">
				<input type="tel" placeholder="Telefon" name="tel">
			</div>

			<div class="line">
				<input type="password" placeholder="Şifre" name="password"  required> 
			</div>
			
			<div class="line">
				<input class="button" type="submit" name="submit" >
			</div>
			</form>
			<a class="dipnot" href="index.php">Zaten üye misiniz?</a>
			
		</div>

	</div>


<br><br><br><br><br><br>
</body>

<?php
        if(isset($_POST["submit"])) //button a basılmışsa
    {
        include "conn.php";
        $sql = "INSERT INTO student(name,email,password,mobileNumber) VALUES (?,?,?,?);";
        $dizi = [ //formdaki name değerlerine göre diziye atadık
            $_POST["adsoyad"],
            $_POST["email"],
            $_POST["password"],
            $_POST["tel"]
        ];

        $sth = $baglan->prepare($sql); // sth statement nesnesi döner
        $sonuc = $sth->execute($dizi); //? lerini sorguyu çalıştırırken gönderiyoruz dizi ile
        echo "register oldu";
        header("Location:login.php");
    }
?>


</html>












