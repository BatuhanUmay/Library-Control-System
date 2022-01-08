<?php
session_start();
include "conn.php";
    if(isset($_POST["kaydet"])) //button a basılmışsa
    {
        $sql = "INSERT INTO book(name,authorId,categoyId,totalPage,bookPrice) VALUES (?,?,?,?,?);";
        $dizi = [ //formdaki name değerlerine göre diziye atadık
            $_POST["name"],
            $_POST["authorId"],
            $_POST["categoyId"],
            $_POST["totalPage"],
            $_POST["bookPrice"]
        ];

        $sth = $baglan->prepare($sql); // sth statement nesnesi döner
        $sonuc = $sth->execute($dizi); //? lerini sorguyu çalıştırırken gönderiyoruz dizi ile
        header("Location:kitapBulma.php");
    }

$sqlAuthor = "SELECT * FROM author";
$sorguAuthor = $baglan->prepare($sqlAuthor);
$sorguAuthor->execute();

$sqlCat = "SELECT * FROM category";
$sorguCAT = $baglan->prepare($sqlCat);
$sorguCAT->execute();

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
                <h1 class="display-1 text-center">Kitap Detay Ekranı</h1>
            </div>

            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="kitapBulma.php" class="btn btn-outline-primary">Tüm Kitaplar</a>
                        <a href="kitapEkle.php" class="btn btn-outline-primary">Kitap Ekle</a>
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
                                <label for="inputEmail4" class="form-label">Kitap adı</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">yazar adı</label>
                                <select class="form-select" name="authorId">
                               <?php while ($satirAuthor = $sorguAuthor->fetch(PDO::FETCH_ASSOC)){
                                   ?>
                                   <option value="<?= $satirAuthor["id"]?>"><?= $satirAuthor["authorName"]?></option>

                                   <?php

                               }         
                               ?>
                                </select>
                            </div>
                            
                            <div class="col-6">
                                <label for="inputPassword4" class="form-label">kategori</label>
                                <select class="form-select" name="categoyId">
                                <?php while ($satirCAT = $sorguCAT->fetch(PDO::FETCH_ASSOC)){
                                   ?>
                                   <option value="<?= $satirCAT["id"]?>"><?= $satirCAT["categoryName"]?></option>

                                   <?php

                               }         
                               ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class="form-label">sayfa sayısı</label>
                                <input type="number" class="form-control" name="totalPage">
                            </div>

                            <div class="col-6">
                                <label class="form-label">kitap ücreti</label>
                                <input type="number" class="form-control" name="bookPrice">
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