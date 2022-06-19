<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Artikle</title>
    <meta name="description" content="projektni zadatak iz kolegija Programiranje web aplikacija">
    <meta name="keywords" content="HTML, CSS, JavaScript, JQuery">
    <meta name="author" content="Maja Vignjević">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/eb1ab0df5d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="article">
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
    <?php
    $idClanak = $_GET['id'];
    define('URL', 'img/'); 
    include 'connect.php';
    if ($dbc) 
    {
        $query = "SELECT * FROM clanci WHERE ID = $idClanak";
        $result = mysqli_query($dbc, $query) or die("Error");

        if ($result) 
        {
            while ($row = mysqli_fetch_array($result)) 
            {
                    $title = $row["naslov"];
                    $content= nl2br($row["tekst"]);
                    $image = $row["slika"];
                    $date = $row["datum"];
                    $category = $row["kategorija"];
                    $about = $row["sazetak"];
            }
        }
    } 
    ?>
    <section role="main">
        <section role="tijelo">
            <section class="naslov">
                <h2 class="title">
                    <?php
                        echo $title; 
                    ?>
                </h2>
            </section>
            <section class="datum">
                <p>
                    <i class="fa-regular fa-clock fa-1x" style="font-size:48px;color:black;"></i> <?php echo $date; ?>
                </p>
            </section>
            <section class="slika">
                <?php 
                    echo '<img src="'.URL.$image.'">';
                ?>
            </section>
            <section class="about">
                <b>
                    <br>
                    <?php 
                        echo $about; 
                    ?>
                </b>
            </section>
            <section class="sadrzaj">
                <br>
                <?php
                    echo $content;
                ?>
            </section>
        </section>
    </section>
    <footer class="container-fluid">
        <p>
            <b>©Copyright, Maja Vignjević, mvignjevi@tvz.hr, 2022.</b>
        </p>
    </footer>
</body>
</html>