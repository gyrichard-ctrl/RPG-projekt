<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nev = $_POST['nev'];
    $cnev = $_POST['cnev'];

    // Store data in session
    $_SESSION['karakter'] = [
        'nev'  => $nev,
        'knev' => $cnev,
    ];

    // Redirect to the character sheet page
    header('Location: Sheet.php');
    exit();
}
?>
<!-- HTML form for character creation -->
<form method="post" action="">
    <H1>Karakter Létrehozása</H1><br>
    <label for="nev">Név:</label>
    <input type="text" id="nev" name="nev" required>
    <label for="cnev">Karakter név:</label>
    <select name="cnev" id="knev" required>
        <option value="">Válassz célnévvel</option>
        <option value="Spyro">Spyro</option>
        <option value="Spiderman">Spiderman</option>
        <option value="Lightning mcqueen">Lightning mcqueen</option>
    </select>
    <button type="submit">Karakter Létrehozása</button><br>
    <div id="kep"></div>
</form>
<!-- JavaScript to handle character image rendering -->
<script>
const kep = document.getElementById('kep');
const cnevSelect = document.getElementById('knev');

function renderKep() {
    const cnev = cnevSelect.value;
    const imageMap = {
        Spyro: 'Spyro.png',
        Spiderman: 'Spiderman.png',
        Lightningmcqueen: 'Lightning mcqueen.png'
    };

    if (!cnev || !imageMap[cnev]) {
        kep.innerHTML = '';
        return;
    }

    kep.innerHTML = '<img src="' + imageMap[cnev] + '" alt="' + cnev + '">';
}

cnevSelect.addEventListener('change', renderKep);
renderKep();
</script>