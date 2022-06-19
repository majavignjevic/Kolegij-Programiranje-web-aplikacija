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
                <a class="nav-link" href="unos.html">NEU</a>
            </li>
            </ul>
        </div>
        </nav>
    </header>
    <section role="mainUnos">
        <?php
        include 'connect.php';
        session_start();
        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $sessionUser=$_SESSION['username'];
            $password=$_POST['password'];
            $hashedPassword=password_hash($password, CRYPT_BLOWFISH);

            $querry = "SELECT korisnicko_ime, lozinka, razina FROM korisnici WHERE korisnicko_ime = ?";
            
            $stmt=mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $querry)){
            mysqli_stmt_bind_param($stmt,'s',$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            }
            mysqli_stmt_bind_result($stmt, $korisnicko_ime, $lozinka, $razina);
            mysqli_stmt_fetch($stmt);
            if(password_verify($password,$lozinka)){
                echo "<h1>Dobrodošli $username</h1>";
                $_SESSION['$username'] = $korisnicko_ime;
                $_SESSION['$level'] = $razina;
                if($razina>0){
                    echo '<p>Molimo nastavite: <a href="administracija.php">ADMINISTRACIJA</a></p>';
                }
                else{
                    echo '<p>Nažalost, nemate dovoljna prava za pristup ovoj stranici</p>';
                }
            }
            else if(mysqli_stmt_num_rows($stmt)<=0){
                echo '<h1>Nažalost, nismo pronašli ' . $username. '. Molimo <a href="login-novi.php">registrirajte</a> se!</h1>';
            }
            else {
                echo 'Molimo pokušajte <a href="login.php">ponovo!</a> Krivo korisničko ime i/ili lozinka';
            }
        }
        ?>
    </section>
</body>
</html>