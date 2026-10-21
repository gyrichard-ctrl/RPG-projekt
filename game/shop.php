<?php
require_once '../includes/auth.php';
require_once '../includes/conn.php';
require_once '../includes/layout_start.php';



$sql = "SELECT * FROM potishopitems";
$lekerdezes = mysqli_query($conn, $sql);
$termekek=[];

echo '<div class="shopContainer">';
while ($item = mysqli_fetch_assoc($lekerdezes)) {
    echo '<div class="shopKartya">'
        . '<h2>' . htmlspecialchars($item['name'] ?? '') . '</h2>'
        . '<img src="' . htmlspecialchars($item['image'] ?? '') . '">'
        . '<p>Ára: <span>' . htmlspecialchars($item['price'] ?? '') . '</span> píz</p>'
        . '<p>' . htmlspecialchars($item['info'] ?? '') . '</p>'
        . '<button onclick="buyItem()">Vásárlás</button>'
        . '</div>';
}
echo '</div>';
?>

<?php
require_once '../includes/layout_end.php';
?>
