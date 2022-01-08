<?php

include "conn.php";

if(isset($_POST['gonder'])){ 
    
    $sql = "INSERT INTO oneriler(fullname, email, comments) VALUES (?,?,?);";

    $dizi = [
        $_POST["fullname"],
        $_POST["email"],
        $_POST["textarea"]
    ];

    $sth = $baglan->prepare($sql); 
    $sth->execute($dizi); 
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öneri Ve Şikayetler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php include("header_student.php"); ?>
<a href="studentHome.php" class="btn btn-outline-primary">Ana Sayfa</a>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Önerileriniz</h4>
                        <p class="card-text">Sitemizi sizlere daha iyi ve kaliteli bir site haline getirmek için önerilerinizi merak ediyoruz.</p>
                    </div>
                    <div style="text-align: center;">
                        <img src="assests/olumluoneri.jpg" alt="" width="280" height="250">
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Şikayetleriniz</h4>
                        <p class="card-text">Sizlere daha iyi bir hizmet sunmak için sitemizde gördüğüniz eksikleri lüften bize bildirin</p>
                    </div>
                    <div style="text-align: center;">
                        <img src="assests/sikayet.jpeg" alt="" width="280" height="250">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <h2>Form Bilgileri</h2>
                <form  action="" method="POST" class="form-inline">
                    <label class="sr-only" for="inlineFormInputName2">Ad Soyad</label>
                    <input name="fullname" type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="İsim ve Soyisminiz">

                    <label class="sr-only" for="inlineFormInputGroupUsername2">Email</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input name="email" type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="deneme@gmail.com">
                    </div>

                    <div class="form-floating mb-3">
                        <input type="textarea" name="textarea" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></input>
                        <label for="floatingTextarea2">Sitemiz Hakkında Yorumlarınız</label>
                    </div>

                    <button name="gonder" type="submit" class="btn btn-primary mb-2">Gönder</button>
                </form>

            </div>
        </div>
    </div>





</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>