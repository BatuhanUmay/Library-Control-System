<?php

    if(isset($_POST["ekle"])) //button a basılmışsa
    {
        include "conn.php";
        $sql = "INSERT INTO category(categoryName) VALUES (?);";
        $dizi = [ //formdaki name değerlerine göre diziye atadık
            $_POST["kategori"]
        ];

        $sth = $baglan->prepare($sql); // sth statement nesnesi döner
        $sonuc = $sth->execute($dizi); //? lerini sorguyu çalıştırırken gönderiyoruz dizi ile
        header("Location:kategori.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Ekleme Sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<?php include("header.php"); ?>
    <header>
        <div class="container">
            <div class="row">
                <h1 class="display-1 text-center">Kategori Ekleme Ekranı</h1>
            </div>

            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="kategori.php" class="btn btn-outline-primary">Tüm Kategoriler</a>
                        <a href="kategori_ekle.php" class="btn btn-outline-primary">Kategori Ekle</a>
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
                                <label for="inputEmail4" class="form-label">Kitap Kategorisi</label>
                                <input type="text" class="form-control" name="kategori">
                            </div>

                            <button type="submit" name="ekle" class="btn btn-primary mt-4">Ekle</button>

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