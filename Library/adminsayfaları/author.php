<?php
session_start();
include "conn.php";

if (isset($_POST["filtrele"])) {

    if (($_POST["artAzl"] == 0)) {
        $sql = "SELECT * FROM author";
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute();
    }

    else if (($_POST["artAzl"] == 1)) {
        $sql = "SELECT * FROM author ORDER BY authorName asc;";
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute();
    }

    else if (($_POST["artAzl"] == 2)) {
        $sql = "SELECT * FROM author ORDER BY authorName desc";
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute();
    }

    else {
        $sql = "SELECT * FROM author ORDER BY authorName desc;";
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute();


    }
}


else if (isset($_GET["sil"])) { // href ten gelen sil komutu gelmişse 
    $sqlsil = "DELETE FROM author WHERE id=?";
    $sorgusil = $baglan->prepare($sqlsil);
    $sorgusil->execute([
        $_GET["sil"] // dizi olarak göndermemiz gerekiyor
    ]); //sil kısmı gelmişse onu çalıştırıyor

    header("Location:author.php");
}
else {

$sql = "SELECT * FROM author";
$sorgu = $baglan->prepare($sql);
$sorgu->execute();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yazar Bilgi Ekranı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php include("header.php"); ?>

    <header>
        <div class="container">
            <div class="row">
                <h1 class="display-1 text-center">Yazar Bilgi Ekranı</h1>
            </div>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="author.php" class="btn btn-outline-primary">Tüm Yazarlar</a>
                            <a href="author_ekle.php" class="btn btn-outline-primary">Yazar Ekle</a>
                            <br>
                            <select class="custom-select" name="artAzl">
                                <option selected value="0">Şuna göre sırala:</option>
                                <option value="1">Artan Şekilde Sırala</option>
                                <option value="2">Azalan Şekilde Sırala</option>
                            </select>

                            <button type="submit" name="filtrele" class="mx-1 btn btn-primary mt-4">Kaydet</button>
                            <script type="text/javascript">$("#TablePart").load(document.URL +  ' #TablePart')</script>

                        </div>
                    </div>
                </div>
            </form>
        </div>

    </header>

    <main>
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <table id="TablePart" class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">author Name</th>
                                <th scope="col">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                                <!--  
                                    ->fetch ile her seferinde veri getiriliyor databaseden
                                    PDO::FETCH_ASSOC veri başlıklarını sırayla alıyor
                                    ör: id,name,email...
                                -->
                                <tr>
                                    <th scope="row"><?= $satir['id'] ?></th>
                                    <td><?= $satir['authorName'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- detay sayfasında id si istenen idye sahip kişinin bilgisi -->
                                            <a href="author_detay.php?id=<?= $satir['id'] ?>" class="btn btn-success">Detay</a>
                                            <a href="author_guncelle.php?id=<?= $satir['id'] ?>" class="btn btn-secondary">Güncelle</a>
                                            <a href="?sil=<?= $satir['id'] ?>" onclick="return confirm('Silinsin mi?')" class="btn btn-danger">Sil</a>
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer></footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>







