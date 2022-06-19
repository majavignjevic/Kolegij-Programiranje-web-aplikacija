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
    <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>    
    <script src="js/form-validation.js"></script> 
</head>
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
    <h1>WILLKOMMEN</h1>
    <form enctype="multipart/form-data" action="registracija.php" method="POST" name="login">
        <div class="form-item">
            <label for="username">Unesite svoje korisničko ime: </label>
            <div class="form-field">
                <input type="text" name="username" id="username">
            </div>
        </div>
        <div class="form-item">
            <label for="password">Unesite svoju lozinku: </label>
            <div class="form-field">
                <input type="password" name="password" id="password">
            </div>
        </div>
        <div class="form-item botuni">
            <input type="reset" name="reset" value="Ponovi">
            <input type="submit" name="submit" value="Podnesi">
        </div>
    </form>
    <?php
        session_start();
        $sessionUser=$_SESSION['username'];
    ?>
    <script>
        $("form[name='login']").validate;
    </script>
</section>
</body>
</html>