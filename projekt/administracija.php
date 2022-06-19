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
        <h1>Vijesti u bazi:</h1>
        <?php
        define('URL', 'img/'); 
        include 'connect.php';

        $query = "SELECT * FROM clanci";
        $result = mysqli_query($dbc, $query);

        while($row = mysqli_fetch_array($result)) {
            echo '<form enctype="multipart/form-data" action="skripta.php" method="POST">';
            echo '<div class="form-item">';
            echo '  <label for="title">Naslov vjesti:</label>';
            echo '  <div class="form-field">';
            echo '      <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">';
            echo '  </div>';
            echo '</div>';
            echo '<div class="form-item">';
            echo '    <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>';
            echo '    <div class="form-field">';
            echo '        <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea>';
            echo '     </div>';
            echo '</div>';
            echo '<div class="form-item">';
            echo '    <label for="content">Sadržaj vijesti:</label>';
            echo '    <div class="form-field">';
            echo '        <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea>';
            echo '    </div>';
            echo '</div>';
            echo '<div class="form-item">';
            echo '    <label for="fileToUpload">Slika: </label>';
            echo '    <div class="form-field">';
            echo '        <input type="file" class="input-text" id="fileToUpload" value="'.$row['slika'].'" name="fileToUpload"/> <br><img src="' . URL .$row['slika'] . '" width=100px>'; // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
            echo '    </div>';
            echo ' </div>';
            echo '<div class="form-item">';
            echo '    <label for="category">Kategorija vijesti:</label>';
            echo '    <div class="form-field">';
            echo '        <select name="category" id="category" class="form-field-textual" value="'.$row['kategorija'].'">';
            echo '            <option value="reise">REISE</option>';
            echo '            <option value="hamburg">HAMBURG</option>';
            echo '            <option value="im-norden">IM NORDEN</option>';
            echo '            <option value="sport">SPORT</option>';
            echo '        </select>';
            echo '    </div>';
            echo '</div>';
            echo '<div class="form-item">';
            echo '<label>Spremiti u arhivu:';
            echo '    <div class="form-field">';
                         if($row['arhiva'] == 0) {
            echo '          <input type="checkbox" name="archive" id="archive"/>Arhiviraj?';
                        } else {
            echo '          <input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                        };
            echo '     </div>';
            echo '</label>';
            echo '</div>';
            echo '<div class="form-item botuni">';
            echo '    <input type="hidden" name="id" class="form-field-textual"value="'.$row['ID'].'">';
            echo '    <button type="reset" value="Poništi">Poništi</button>';
            echo '    <button type="submit" name="update" value="Prihvati">Izmjeni</button>';
            echo '    <button type="submit" name="delete" value="Izbriši">Izbriši</button>';
            echo '</div>';
            echo '</form>';
        }
        ?>
</section>
</body>
</html>