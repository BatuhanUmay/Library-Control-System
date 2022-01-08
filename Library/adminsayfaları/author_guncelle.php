<?php

include "conn.php";

if(isset($_POST['guncelle'])){ // güncelle butonu geldiyse
    $sql = "UPDATE author SET 
    authorName = ?
    WHERE id = ?";

    $dizi = [
        $_POST["author"],
        $_POST["id"]
    ];

    $sorgu = $baglan->prepare($sql);
    $sorgu->execute($dizi);

    header("Location:author.php");
}


$sql = "SELECT * FROM author WHERE id=?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([
    $_GET["id"] //get ile gelen id bir statement nesnesi döndürecek
]);

$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
//PDO::FETCH_ASSOC sadece bir satırı alan adlarıyla birlikte getirmemizi sağlıyor


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yazar Ekleme Sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php include("header.php"); ?>

    <header>
        <div class="container">
            <div class="row">
                <h1 class="display-1 text-center">Yazar Güncelleme Ekranı</h1>
            </div>

            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="author.php" class="btn btn-outline-primary">Tüm Yazarlar</a>
                        <a href="author_ekle.php" class="btn btn-outline-primary">Yazar Ekle</a>
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
                            <input type="hidden" name="id" value="<?= $satir["id"]?>">
                    
                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">Yazar Adı</label>
                                <input type="text" class="form-control" name="author" value="<?= $satir["authorName"]?>">
                            </div>
                                                     
                            <button type="submit" name="guncelle" class="btn btn-primary mt-4">Güncelle</button>

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