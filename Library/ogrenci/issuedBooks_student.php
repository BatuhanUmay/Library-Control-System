<?php
session_start();
$id = $_SESSION["id"];

include "conn.php";

$sql = "SELECT book.name, issuedbooks.issueDate, issuedbooks.returnDate, issuedbooks.returned FROM issuedbooks LEFT JOIN book ON book.id = issuedbooks.bookId INNER JOIN student on student.id = issuedbooks.studentId WHERE student.id = ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([$id]);




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
                <h1 class="display-1 text-center">Öğrenci İşlemleri</h1>
            </div>
            <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                       
                        <a href="studentHome.php" class="btn btn-outline-primary">Ana Sayfa</a>
                    </div>
                   
                </div>
            </div>
             </form>
        </div>

    </header>

    <main>
        <div class="container">
            <div class="row mt-4">
                <div class="col" >
                    <table  id="TablePart" class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Book Name</th>
                                <th scope="col">Issue Date</th>
                                <th scope="col">Return Date</th>
                                <th scope="col">Returned</th>

                            </tr>
                        </thead>
                        <tbody >
                            <?php while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                               <!--  
                                    ->fetch ile her seferinde veri getiriliyor databaseden
                                    PDO::FETCH_ASSOC veri başlıklarını sırayla alıyor
                                    ör: id,name,email...
                                -->
                                <tr>
                                    <td><?= $satir['name'] ?></td>
                                    <td><?= $satir['issueDate'] ?></td>
                                    <td><?= $satir['returnDate'] ?></td>
                                    <td><?= $satir['returned'] ?></td>
                                    
                                    
                                </tr>

                            <?php } 
                            ?>

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