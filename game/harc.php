<?php
require_once '../includes/auth.php';

if (!isset($_SESSION['actualLocation'])) {
    header("Location: map.php");
    exit;
}

require_once "../includes/conn.php";

$location = $_SESSION['actualLocation'];

// Szörnyek lekérése a helyszín alapján
$sql = "SELECT * FROM monsters WHERE location = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $location);
mysqli_stmt_execute($stmt);

$lekerdezes = mysqli_stmt_get_result($stmt);

// Szörnyek eltárolása tömbben
$monsters = [];

while ($row = mysqli_fetch_assoc($lekerdezes)) {
    $monsters[] = $row;
}

// Ellenőrzés, hogy van-e szörny
if (empty($monsters)) {
    exit("Ezen a helyszínen nincsenek szörnyek.");
}

// Véletlenszerű szörny kiválasztása
$monster = $monsters[array_rand($monsters)];

require_once '../includes/layout_start.php';
?>

<h1>Harcccccc</h1>

<p>
    A(z) <?php echo htmlspecialchars($location); ?>
    helyszínen jársz!
</p>

<p>
    Egy
    <strong><?php echo $monster['name']; ?></strong>
    támadott meg!
</p>
<p>Élete:<?php echo $monster['hp']; ?></p>
<p>Sebzése:<?php echo $monster['dmg']; ?></p>
<hr><hr>
<div>
    <?php include "harcLogika.php"; ?>
</div>

<?php
require_once '../includes/layout_end.php';
?>