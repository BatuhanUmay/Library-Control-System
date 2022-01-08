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
			<h2 class="headerForm" >GİRİŞ YAP</h2>
			<form action="" method="POST" aciton="" id="Login">
			<div class="line">
				<input type="email" placeholder="E-mail" name="email" value="admin@root.com" required>
			</div>
			
			<div class="line">
				<input type="password" placeholder="Password" name="password" value="changeme" required> 
			</div>
			
			<div class="line">
				<input class="button" type="submit" name="submit" >
			</div>
			</form>
			<a class="dipnot" href="studentRegister.php">Hesabınız yok mu?</a>

		</div>

	</div>


<br><br><br><br><br><br>
</body>

<?php
session_start();
	include_once 'conn.php';

  //  $link=mysqli_connect('localhost','root','');
  // mysqli_select_db($link,'db');
    
    if(isset($_POST["submit"])){

        $link = mysqli_connect('localhost','root','');
   			mysqli_select_db($link,'librarydb');

				$email = $_POST["email"];
        $password =$_POST["password"];

        $sql = mysqli_query($link,"SELECT * FROM admin WHERE email ='$email' and password= '$password'");
   
        $satirSayisi = mysqli_num_rows($sql);

        if($satirSayisi == 1){
			
        	header("Location:adminsayfaları/adminhome.php");
        } 
        else{
        	$sql2 = mysqli_query($link,"SELECT * FROM student WHERE email ='$email' and password= '$password'");

			$sqlid = "SELECT * FROM student WHERE email ='$email' and password= '$password'";
			$sorgu = $baglan->prepare($sqlid);
			$sorgu->execute();

        	$satirSayisi2 = mysqli_num_rows($sql2);

		

			$satirid = $sorgu->fetch(PDO::FETCH_ASSOC);

        	if($satirSayisi2 == 1){

        			$_SESSION["id"] = $satirid["id"];
        			header("Location:ogrenci/studentHome.php");
        			
       		 }
       		 else{
       		 	echo 'OLMUYOOOO be';
       		 } 





        }
        
    }



    ?>


</html>