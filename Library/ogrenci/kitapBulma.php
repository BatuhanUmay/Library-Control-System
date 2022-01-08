<?php
session_start();
include "conn.php";
if (isset($_POST["listele"])) {
    $sirala = $_POST["sirala"];
    $categoyId = $_POST["categoyId"];
    $authorId = $_POST["authorId"];

    if ((($categoyId != "1") or ($authorId != "1")) and ($sirala == "1")) {
        $sql = "SELECT book.id,book.name,author.authorName,book.totalPage,book.bookPrice,category.categoryName FROM book inner JOIN category ON book.categoyId = category.id inner JOIN author ON book.authorId = author.id WHERE $categoyId and $authorId ";
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute();
        $sqlsay = "SELECT COUNT(id) FROM book WHERE $categoyId and $authorId GROUP BY categoyId and authorId";

    } else if ((($categoyId != "1") or ($authorId != "1")) and ($sirala != "1")) {
        $sql = "SELECT book.id,book.name,author.authorName,book.totalPage,book.bookPrice,category.categoryName FROM book inner JOIN category ON book.categoyId = category.id inner JOIN author ON book.authorId = author.id  WHERE $categoyId and $authorId $sirala";
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute();
        $sqlsay = "SELECT COUNT(id) FROM book WHERE $categoyId and $authorId GROUP BY categoyId and authorId";

    } else if ((($categoyId == "1") or ($authorId == "1")) and ($sirala == "1")) {
        $sql = "SELECT book.id,book.name,author.authorName,book.totalPage,book.bookPrice,category.categoryName FROM book inner JOIN category ON book.categoyId = category.id inner JOIN author ON book.authorId = author.id ";
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute();
        $sqlsay = "SELECT COUNT(id) FROM book GROUP BY categoyId and authorId";

    } else if ((($categoyId == "1") or ($authorId == "1")) and ($sirala != "1")) {
        $sql = "SELECT book.id,book.name,author.authorName,book.totalPage,book.bookPrice,category.categoryName FROM book inner JOIN category ON book.categoyId = category.id inner JOIN author ON book.authorId = author.id $sirala";
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute();
        $sqlsay = "SELECT COUNT(id) FROM book GROUP BY categoyId and authorId";

    }
} else {
    $sql = "SELECT book.id,book.name,author.authorName,book.totalPage,book.bookPrice,category.categoryName FROM book inner JOIN category ON book.categoyId = category.id inner JOIN author ON book.authorId = author.id ";
    $sorgu = $baglan->prepare($sql);
    $sorgu->execute();
    $sqlsay = "SELECT COUNT(id) FROM book";
}


$sorgusay = $baglan->prepare($sqlsay);
$sorgusay->execute([]);
$say = $sorgusay->fetch(PDO::FETCH_ASSOC);

if(empty($say["COUNT(id)"])) {
   $say["COUNT(id)"] = "0";
}

$sqlCat = "SELECT * FROM category";
$sorguCAT = $baglan->prepare($sqlCat);
$sorguCAT->execute();

$sqlAuthor = "SELECT * FROM author";
$sorguAuthor = $baglan->prepare($sqlAuthor);
$sorguAuthor->execute();

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
    <?php include("header_student.php"); ?>

    <header>
        <div class="container">
            <div class="row">
                <h1 class="display-1 text-center">Kitap Detay Ekranı</h1>
            </div>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="kitapBulma.php" class="btn btn-outline-primary">Tüm Kitaplar</a>
                            <p class="">kategori </p>
                            <select class="form-select" name="categoyId">
                                <option selected value="1"> Kategori seç</option>
                                <?php while ($satirCAT = $sorguCAT->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option name="opt1" value="categoyId = <?= $satirCAT["id"] ?>"><?= $satirCAT["categoryName"] ?> </option>
                                <?php

                                }
                                ?>
                            </select>
                            <p class="">yazar </p>
                            <select class="form-select" name="authorId">
                                <option selected value="1"> Yazar seç</option>
                                <?php while ($satirAuthor = $sorguAuthor->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option name="opt2" value="authorId = <?= $satirAuthor["id"] ?>"><?= $satirAuthor["authorName"] ?></option>
                                <?php

                                }
                                ?>
                            </select>
                            <p class="">sirala </p>
                            <select class="form-select" name="sirala">
                                <option selected value="1"> sırala</option>
                                <option name="opt3" value="ORDER BY totalPage DESC">sayfa sayısı azalan</option>
                                <option name="opt3" value="ORDER BY totalPage ASC">sayfa sayısı artan</option>
                                <option name="opt3" value="ORDER BY bookPrice DESC">fiyat sayısı azalan</option>
                                <option name="opt3" value="ORDER BY bookPrice ASC">fiyat sayısı artan</option>
                                
                                <option name="opt3" value="ORDER BY authorId ASC">yazar ismi artan</option>
                                <option name="opt3" value="ORDER BY authorId DESC">yazar ismi azalan</option>
                                <option name="opt3" value="ORDER BY categoyId ASC">kategori türü artan</option>
                                <option name="opt3" value="ORDER BY categoyId DESC">kategori türü azalan</option>

                            </select>
                            <button type="submit" name="listele" class="btn btn-primary mt-4">Listele</button>
                            <script type="text/javascript">
                                $("#TablePart").load(document.URL + ' #TablePart')
                            </script>

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
                                <th scope="col">Name</th>
                                <th scope="col">Author Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Total Page</th>
                                <th scope="col">Book Price</th>
                                <th scope="col">İşlemler</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {


                            ?>
                                <!--  
                                    ->fetch ile her seferinde veri getiriliyor databaseden
                                    PDO::FETCH_ASSOC veri başlıklarını sırayla alıyor
                                    ör: id,name,email...
                                -->
                                <tr>
                                    <th scope="row"><?= $satir['id'] ?></th>
                                    <td><?= $satir['name'] ?></td>
                                    <td><?= $satir['authorName'] ?></td>
                                    <td><?= $satir['categoryName'] ?></td>
                                    <td><?= $satir['totalPage'] ?></td>
                                    <td><?= $satir['bookPrice'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- detay sayfasında id si istenen idye sahip kişinin bilgisi -->
                                            <a href="kitapDetay.php?id=<?= $satir['id'] ?>" class="btn btn-success">Detay</a>
                                        
                                        </div>
                                    </td>
                                </tr>

                            <?php }
                            ?>

                        </tbody>
                       
                    </table>
                     <p align="right">Bulunan kitap sayısı = <?= $say["COUNT(id)"] ?></p>

                </div>
            </div>
        </div>

    </main>

    <footer></footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>