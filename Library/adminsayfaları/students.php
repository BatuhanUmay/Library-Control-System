<?php
include "conn.php";

if(isset($_GET["sil"])){ // href ten gelen sil komutu gelmişse 
    $sqlsil = "DELETE FROM student WHERE id=?";
    $sorgusil = $baglan->prepare($sqlsil);
    $sorgusil->execute([
        $_GET["sil"] // dizi olarak göndermemiz gerekiyor
    ]); //sil kısmı gelmişse onu çalıştırıyor

    header("Location:students.php");
}

$sql = "SELECT * FROM student";
$sorgu = $baglan->prepare($sql);
$sorgu->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Bilgi Ekranı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php include("header.php"); ?>

    <header>
        <div class="container">
            <div class="row">
                <h1 class="display-1 text-center">Öğrenci Bilgi Ekranı</h1>
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
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Mobile Number</th>
                                <th scope="col">Create Date</th>
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
                                    <td><?= $satir['name'] ?></td>
                                    <td><?= $satir['email'] ?></td>
                                    <td><?= $satir['password'] ?></td>
                                    <td><?= $satir['mobileNumber'] ?></td>
                                    <td><?= $satir['createDate'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- detay sayfasında id si istenen idye sahip kişinin bilgisi -->
                                            <a href="detay.php?id=<?= $satir['id'] ?>" class="btn btn-success">Detay</a>
                                            <a href="guncelle.php?id=<?= $satir['id'] ?>" class="btn btn-secondary">Güncelle</a>
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