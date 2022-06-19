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
<body>
<header>
    <nav class="navbar navbar-expand-sm">
    <img id="MOPO" src="img/mopo-hamburger-morgenpost-logo-C247EC076D-seeklogo.com.png"/>            
    <div class="container-fluid">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="indeks.php">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kategorija.php?kategorije='reise'">REISE</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kategorija.php?kategorije='hamburg'">HAMBURG</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kategorija.php?kategorije='im-norden'">IM NORDEN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kategorija.php?kategorije='sport'">SPORT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">LOGIN</a>
        </li>
        </ul>
    </div>
    </nav>
</header>
<div class="tijelo">
    <?php
        include 'connect.php'; 
        define('URL', 'img/'); 
        $idKategorije = $_GET['kategorije'];

    ?>
    <section class="container reise">
        <div class="row">
            <h1 class="col-lg-12 col-12"><?php
            if ($idKategorije==="'reise'"){
                echo "REISE";
            }
            else if ($idKategorije==="'hamburg'"){
                echo "HAMBURG";
            }
            else if ($idKategorije==="'im-norden'"){
                echo "IM NORDEN";
            }
            else if ($idKategorije==="'sport'"){
                echo "SPORT";
            }
            ?></h1>
        </div>
        <?php
            $query = "SELECT * FROM clanci WHERE kategorija=$idKategorije";
            $result = mysqli_query($dbc, $query)or die("Error");
            while($row = mysqli_fetch_array($result)) {
                echo '<section class="row clanci">';
                echo '<div class="col">';
                echo '<img src="' . URL . $row['slika'] . '" class="img-fluid">';
                echo '</div>';
                echo "<article class='col'><br>";
                echo '<p><h2><a href="article.php?id='.$row['ID'].'">';
                echo $row['naslov'];
                echo '</a></h2><br>';
                echo "</p></article>";
                echo '</section>';
            }
        ?>
    </section>
</div>
<footer class="container-fluid">
    <p>
        <b>©Copyright, Maja Vignjević, mvignjevi@tvz.hr, 2022.</b>
    </p>
</footer>
</body>
</html>