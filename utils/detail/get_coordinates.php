<?php
$ville = $_GET['ville'] ?? '';
$response = [];

if ($ville) {
    $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($ville);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Trackable');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    
    $result = curl_exec($ch);

    if ($result === false) {
        $response = ['error' => 'Erreur lors de la requête CURL: ' . curl_error($ch)];
    } else {
        $data = json_decode($result, true);

        if (!empty($data)) {
            $response = [
                'lat' => $data[0]['lat'],
                'lon' => $data[0]['lon']
            ];
        } else {
            $response = ['error' => 'Ville non trouvée'];
        }
    }

    curl_close($ch);
} else {
    $response = ['error' => 'Ville non spécifiée'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
