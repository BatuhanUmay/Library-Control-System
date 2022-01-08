<?php
include "conn.php";

$sql = "SELECT book.name,author.authorName,book.totalPage,book.bookPrice,category.categoryName FROM book inner JOIN category ON book.categoyId = category.id inner JOIN author ON book.authorId = author.id WHERE book.id=?";
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
    <title>Öğrenci Bilgi Ekranı</title>
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
            <div class="row mt-4">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?=$satir["name"]?>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">Yazar: <?=$satir["authorName"]?></h6>
                            <p class="card-text">İçerik: Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum minima officiis quidem.</p>
                            <p class="card-text">Sayfa sayısı: <?=$satir["totalPage"]?></p>
                            <p class="card-text">ücreti: <?=$satir["bookPrice"]?>₺</p>
                            <p class="card-text">Kategori: <?=$satir["categoryName"]?></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer></footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>