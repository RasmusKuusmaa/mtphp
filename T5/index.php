<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koma vigade parandaja</title>
</head>
<body>
    <form action="veaparandaja.php" method="POST"> 
        <label>Sisesta tekst</label>
        <textarea  name="tekst"></textarea>
        <button type="submit">Paranda vead</button>
    </form>
    <label>Parandatud tekst:</label>
    <div id="parandatud_tekst"  readonly>
        <?php
            if (isset($_GET['parandatud_tekst'])){
                echo ($_GET['parandatud_tekst']);
            }
        ?>
    </div>
</body>
</html>