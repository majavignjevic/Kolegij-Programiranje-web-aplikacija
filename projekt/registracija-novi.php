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

        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $surname=$_POST['surname'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $password1=$_POST['password1'];
            $hashedPassword=password_hash($password, CRYPT_BLOWFISH);
            $razina=0;

            $sql = "INSERT INTO korisnici (ime, prezime, korisnicko_ime, lozinka, razina)VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $name, $surname, $username, $hashedPassword, $razina);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik = true;
            }
            if($registriranKorisnik==true){
                echo"<h1>Registracija uspiješna!</h1><p>Dobrodošao $username!<br>Molimo ponovno se ulogirajte.</p>";
            }
        }
        ?>
    </section>
</body>
</html>