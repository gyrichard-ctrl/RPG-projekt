<?php
require_once '../includes/auth.php';

$locations = ['swamp', 'forest', 'village'];

$location = $_POST['location'] ?? '';

if (!in_array($location, $locations, true)) {
    header("Location: map.php");
    exit;
}

$_SESSION['actualLocation'] = $location;

header("Location: harc.php");
exit;