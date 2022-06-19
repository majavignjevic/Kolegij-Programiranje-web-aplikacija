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
    <div class="tijelo">
    <section class="container reise">
        <div class="row">
            <h1 class="col-lg-12 col-12">REISE</h1>
        </div>
        <div class="row">
        <?php
            include 'connect.php'; 
            define('URL', 'img/'); 

            $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='reise' LIMIT 3";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result)) {
                echo "<article class='col'><br>";
                echo "<img src='" . URL. $row['slika'] . " 'class='img-fluid'><br>";
                echo "<p><br>";
                echo '<a href="article.php?id='.$row['ID'].'">';
                echo $row['naslov'];
                echo '</a>';
                echo "</p><br>";
                echo "</article><br>";
            }     
        ?>
        </div>
    </section>
    <section class="container verbraucher">
        <div class="row">
        <h1 class="col-lg-12 col-12">HAMBURG</h1>
        </div>
        <div class="row">
        <?php
            $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='hamburg' LIMIT 3";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result)) {
                echo "<article class='col'><br>";
                echo "<img src='" . URL. $row['slika'] . "' class='img-fluid'><br>";
                echo "<p><br>";
                echo '<a href="article.php?id='.$row['ID'].'">';
                echo $row['naslov'];
                echo '</a>';
                echo "</p><br>";
                echo "</article><br>";
            }     
        ?>
        </div>

    </section>
    </div>
    <footer class="container-fluid">
        <p>
            <b>©Copyright, Maja Vignjević, mvignjevi@tvz.hr, 2022.</b>
        </p>
    </footer>
</body>
</html>