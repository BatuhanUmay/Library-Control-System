<?php

include "conn.php";

if(isset($_POST['guncelle'])){ // güncelle butonu geldiyse
    $sql = "UPDATE book SET 
    name = ?,
    authorId = ?,
    categoyId = ?,
    totalPage = ?, 
    bookPrice = ? WHERE id = ?";

    $dizi = [
        $_POST["name"],
        $_POST["authorId"],
        $_POST["categoyId"],
        $_POST["totalPage"],
        $_POST["bookPrice"],
        $_POST["id"]
    ];

    $sorgu = $baglan->prepare($sql);
    $sorgu->execute($dizi);

    header("Location:kitapBulma.php");
}


$sql = "SELECT book.id,book.name,author.authorName,book.totalPage,book.bookPrice,category.categoryName FROM book inner JOIN category ON book.categoyId = category.id inner JOIN author ON book.authorId = author.id WHERE book.id=?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([
    $_GET["id"] //get ile gelen id bir statement nesnesi döndürecek
]);

$satir = $sorgu->fetch(PDO::FETCH_ASSOC);

//yazarları almak için
$sqlAuthor = "SELECT * FROM author";
$sorguAuthor = $baglan->prepare($sqlAuthor);
$sorguAuthor->execute();

$sqlCat = "SELECT * FROM category";
$sorguCAT = $baglan->prepare($sqlCat);
$sorguCAT->execute();

//PDO::FETCH_ASSOC sadece bir satırı alan adlarıyla birlikte getirmemizi sağlıyor


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
                            <input type="hidden" name="id" value="<?= $satir["id"]?>">
                    
                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">NAME</label>
                                <input type="text" class="form-control" name="name" value="<?= $satir["name"]?>">
                            </div>

                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">AUTHORNAME</label>
                                <select class="form-select" name="authorId">
                               <?php while ($satirAuthor = $sorguAuthor->fetch(PDO::FETCH_ASSOC)){

                                if  ($satirAuthor["authorName"] == $satir["authorName"]) {
                                    ?>
                                    <option selected value="<?= $satirAuthor["id"]?>"><?= $satirAuthor["authorName"]?></option>
                                    <?php
                                }
                                else{
                                   ?>
                                   <option value="<?= $satirAuthor["id"]?>"><?= $satirAuthor["authorName"]?></option>
                                   <?php
                                    }
                               }      

                               ?>
                                </select>
                            </div>
                            
                            <div class="col-6">
                                <label for="inputPassword4" class="form-label">categoriID</label>
                                <select class="form-select" name="categoyId">
                                <?php while ($satirCAT = $sorguCAT->fetch(PDO::FETCH_ASSOC)){

                                if  ($satirCAT["categoryName"] == $satir["categoryName"]) {
                                    ?>
                                    <option selected value="<?= $satirCAT["id"]?>"><?= $satirCAT["categoryName"]?></option>
                                    <?php
                                }
                                else{
                                   ?>
                                   <option value="<?= $satirCAT["id"]?>"><?= $satirCAT["categoryName"]?></option>

                                   <?php
                                }
                               }         
                               ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class="form-label">totelpage</label>
                                <input type="text" class="form-control" name="totalPage" value="<?= $satir["totalPage"]?>">
                            </div>

                            <div class="col-6">
                                <label class="form-label">bookPrice</label>
                                <input type="text" class="form-control" name="bookPrice" value="<?= $satir["bookPrice"]?>">
                                <!-- !!!!! DÜZELTİLECEK:
                                value ya createDate yazınca getirmiyor çünkü date timeda 
                                current time olarak ayarlanmadı formdaki inputta -->
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