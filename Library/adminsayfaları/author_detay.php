<?php
include "conn.php";

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
    <title>Yazar Bilgi Ekranı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php include("header.php"); ?>

    <header>
        <div class="container">
            <div class="row">
                <h1 class="display-1 text-center">Yazar Detay Ekranı</h1>
            </div>

            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="author.php" class="btn btn-outline-primary">Tüm Yazarler</a>
                        <a href="author_ekle.php" class="btn btn-outline-primary">Yazar Ekle</a>
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
                                Yazar
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">Yazar Adı: <?=$satir["authorName"]?></h6>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum minima officiis quidem.</p>
                                                        
                            <a href="#" class="card-link">Amazon</a>
                            <a href="#" class="card-link">Dnr</a>
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