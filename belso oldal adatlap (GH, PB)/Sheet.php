<?php
session_start();
$karakter = [
    'nev'       => $_SESSION['karakter']['nev'],
    'knev'      => $_SESSION['karakter']['knev'],
    'szint'     => 5,
    'hp'        => 120,
    'sebzes'    => 18,
    'pancel'    => 10,
    'kepessegp' => 3,
    'exp'       => 450,
];
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Sheet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="oldalmenu">
        <p>Oldalsó menü</p>
    </div>
    <div id="mainmenu">
        <div id="navbar">
            <p>Navigációs bár</p>
        </div>
        <div id="character">
            <div id="ckep"></div>
            <div id="adatok">
                <p>Név: <span id="nev"><?= htmlspecialchars($karakter['nev']) ?></span></p>
                <p>Karakter név: <span id="knev"><?= htmlspecialchars($karakter['knev']) ?></span></p>
                <p>Szint: <span id="szint"><?= $karakter['szint'] ?></span></p>
                <p>&nbsp;</p>
                <p>Hp: <span id="hp"><?= $karakter['hp'] ?></span></p>
                <p>Sebzés: <span id="sebzes"><?= $karakter['sebzes'] ?></span></p>
                <p>Páncél: <span id="pancel"><?= $karakter['pancel'] ?></span></p>
                <p>&nbsp;</p>
                <p>Képességpont: <span id="kepessegp"><?= $karakter['kepessegp'] ?></span></p>
                <p>Ex: <span id="Exp"><?= $karakter['exp'] ?></span></p>
            </div>
        </div>
    </div>
</body>
</html>
<script>
const ckep = document.getElementById('ckep');
const cnev = "<?= htmlspecialchars($karakter['knev']) ?>";
if (cnev) {
    const imageMap = {
        Spyro: 'Spyro.png',
        Spiderman: 'Spiderman.png',
        Lightningmcqueen: 'Lightning mcqueen.png'
    };

    if (imageMap[cnev]) {
        ckep.innerHTML = '<img src="' + imageMap[cnev] + '" alt="' + cnev + '">';
    }
};
</script>