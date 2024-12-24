<?php
header('Content-Type: application/json');

if (!isset($_GET['lieu_depart'])) {
    echo json_encode(['error' => 'Pas de ville de depar']);
    exit;
}

$ville = urlencode($_GET['lieu_depart']);
$url = "https://nominatim.openstreetmap.org/search?q=$ville&format=json&limit=1";

$rep = file_get_contents($url);
if ($rep === false) {
    echo json_encode(['error' => 'pas de coordonnees.']);
    exit;
}

$data = json_decode($response, true);

if (empty($data)) {
    echo json_encode(['error' => "pas de coordonnees de : $ville"]);
    exit;
}

echo json_encode([
    'lat' => $data[0]['lat'],
    'lon' => $data[0]['lon']
]);
?>
