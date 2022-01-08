<?php

    if(isset($_POST["kaydet"])) //button a basılmışsa
    {
        include "conn.php";
        $sql = "INSERT INTO student(id,name,email,password,mobileNumber,createDate) VALUES (NULL,?,?,?,?,?);";
        $dizi = [ //formdaki name değerlerine göre diziye atadık
            $_POST["adsoyad"],
            $_POST["email"],
            $_POST["password"],
            $_POST["telno"],
            $_POST["tarih"]
        ];

        $sth = $baglan->prepare($sql); // sth statement nesnesi döner
        $sonuc = $sth->execute($dizi); //? lerini sorguyu çalıştırırken gönderiyoruz dizi ile
        header("Location:students.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekleme Sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php include("header.php"); ?>

    <header>
        <div class="container">
            <div class="row">
                <h1 class="display-1 text-center">Öğrenci Ekleme Ekranı</h1>
            </div>

            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="students.php" class="btn btn-outline-primary">Tüm Öğrenciler</a>
                        <a href="ekle.php" class="btn btn-outline-primary">Öğrenci Ekle</a>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <main>
        <div class="container">
            <form action="" method="post">
                <div class="row mt-4 g-3">
                        <form class="row mt-4 g-3">
                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">Adınız ve Soyadınız</label>
                                <input type="text" class="form-control" name="adsoyad">
                            </div>

                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            
                            <div class="col-6">
                                <label for="inputPassword4" class="form-label">Şifreniz</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="col-6">
                                <label class="form-label">Telefon Numaranız</label>
                                <input type="text" class="form-control" name="telno">
                            </div>

                            <div class="col-6">
                                <label class="form-label">Giriş Tarihi</label>
                                <input type="date" class="form-control" name="tarih">
                            </div>

                            <button type="submit" name="kaydet" class="btn btn-primary mt-4">Kaydet</button>

                        </form>
                    </div>

            </form>

        </div>
    </main>

    <footer></footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>