<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hamburger Morgenpost</title>
    <meta name="description" content="projektni zadatak iz kolegija Programiranje web aplikacija">
    <meta name="keywords" content="HTML, CSS, JavaScript, JQuery">
    <meta name="author" content="Maja Vignjević">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="unos">
<header>
        <nav class="navbar navbar-expand-sm">
        <img id="MOPO" src="img/mopo-hamburger-morgenpost-logo-C247EC076D-seeklogo.com.png"/>            
        <div class="container-fluid">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="indeks.php">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kategorija.php?id='reise'">REISE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kategorija.php?id='hamburg'">HAMBURG</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kategorija.php?id='im-norden'">IM NORDEN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kategorija.php?id='sport'">SPORT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">LOGIN</a>
            </li>
            </ul>
        </div>
        </nav>
    </header>
    <section role="mainUnos">
    <?php
        include 'connect.php';

        if(isset($_POST['delete'])){
            $id=$_POST['id'];
            $query = "DELETE FROM clanci WHERE ID=$id ";
            $result = mysqli_query($dbc, $query);
            if($result){
                echo "<h1>Izabrani članak je uspiješno izbrisan</h1>";
            }
            else{
                echo "<h1>Izabrani članak je neuspiješno izbrisan:</h1><br/>Error: ". mysqli_error($dbc);
            }
        }

        if(isset($_POST['update'])){

            $title=$_POST['title'];
            $about=$_POST['about'];
            $content=$_POST['content'];
            $category=$_POST['category'];
            $date=date('d.m.Y.');
            $id=$_POST['id'];
        
            if(isset($_POST['archive'])){
                $archive=1;
            }else{
                $archive=0;
            }
            $picture = $_FILES['fileToUpload']['name'];
            $target = 'img/';
            move_uploaded_file($_FILES['fileToUpload']['name'], $target);

            $query = "UPDATE clanci SET naslov='$title', sazetak='$about', tekst='$content',
            slika='$picture', kategorija='$category', arhiva='$archive' WHERE ID=$id ";
            $result = mysqli_query($dbc, $query);
            if($result){
                echo "<h1>Izabrana vijesti uspiješno izmjenjena</h1>";
            }
            else{
                echo "<h1>Izabrana vijesti neuspiješno izmjenjena</h1><br/>Error: ". mysqli_error($dbc);
            }
        }
    ?>  
</section>
</body>
</html>