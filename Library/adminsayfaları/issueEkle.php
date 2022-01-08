<?php
session_start();
include "conn.php";
    if(isset($_POST["kaydet"])) //button a basılmışsa
    {
        if(isset($_POST['kaydet'])) { 

         $_POST['returned'] = $_POST['returned'] == 'yes' ? 1 : 0;
        }

        $sql = "INSERT INTO issuedbooks(bookId,studentId,returnDate,returned) VALUES (?,?,?,?);";
        $dizi = [ //formdaki name değerlerine göre diziye atadık
            $_POST["kitapAdi"],
            $_POST["studentAdi"],
            $_POST["returnDate"],
            $_POST["returned"]
        ];

        $sth = $baglan->prepare($sql); // sth statement nesnesi döner
        $sonuc = $sth->execute($dizi); //? lerini sorguyu çalıştırırken gönderiyoruz dizi ile
        header("Location:issuedBooks.php");
    }

$sqlBook = "SELECT * FROM book";
$sorguBook = $baglan->prepare($sqlBook);
$sorguBook->execute();

$sqlStudent = "SELECT * FROM student";
$sorguStudent = $baglan->prepare($sqlStudent);
$sorguStudent->execute();

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
                        <a href="issuedBooks.php" class="btn btn-outline-primary">Tüm İşlemler</a>
                        <a href="issueEkle.php" class="btn btn-outline-primary">İşlem Ekle</a>
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
                                <label for="inputEmail4" class="form-label">Kitap Adı</label>
                                <select class="form-select" name="kitapAdi">
                               <?php while ($satirBook = $sorguBook->fetch(PDO::FETCH_ASSOC)){
                                   ?>
                                   <option value="<?= $satirBook["id"]?>"><?= $satirBook["name"]?></option>

                                   <?php

                               }         
                               ?>
                                </select>
                            </div>
                            
                            <div class="col-6">
                                <label for="inputPassword4" class="form-label">Öğrenci Adı</label>
                                <select class="form-select" name="studentAdi">
                                <?php while ($satirStudent= $sorguStudent->fetch(PDO::FETCH_ASSOC)){
                                   ?>
                                   <option value="<?= $satirStudent["id"]?>"><?= $satirStudent["name"]?></option>

                                   <?php

                               }         
                               ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Teslim Tarihi</label>
                                <input type="datetime-local" class="form-control" name="returnDate">
                            </div>

                            <div class="col-6">
                                <label class="form-label">Teslim Edildi mi?</label>
                                <br>
                                <div class="form-check" style="display: inline-block ;
    margin-right: 30px;">
                                  <input class="form-check-input" type="radio" name="returned" id="yes">
                                  <label class="form-check-label" for="yes">
                                    Evet
                                  </label>
                                </div>
                                <div class="form-check" style="display: inline-block ;
    margin-right: 30px;">
                                  <input class="form-check-input" type="radio" name="returned" id="no" checked>
                                  <label class="form-check-label" for="no">
                                    Hayır
                                  </label>
                                </div>
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