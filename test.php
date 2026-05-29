<?php

// Koneksi ke database
$host = 'localhost'; // Sesuaikan dengan host database Anda
$dbname = 'seobjatg_seobjatg'; // Sesuaikan dengan nama database Anda
$username = 'seobjatg_seobjatg'; // Sesuaikan dengan username database Anda
$password = 'vuAQXZFkrSNP'; // Sesuaikan dengan password database Anda

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

// URL API
$url = "https://isoftgame.asia/API/Production/connection.do?cmd=gamelist&agent_code=XXXX&provider_code=XXX&signature=XXXXX";

// Mendapatkan respon dari API
$response = file_get_contents($url);

// Mendekode JSON respon
$data = json_decode($response, true);

if ($data && isset($data['status']) && $data['status'] === 'success' && isset($data['gamelist'])) {
    $gameList = $data['gamelist'];

    // Looping untuk setiap item dalam game list
    foreach ($gameList as $game) {
        // Melakukan pengecekan apakah data sudah ada dalam database berdasarkan game_code
        $gameCode = $game['game_code'];
        $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM game_list WHERE game_code = ?");
        $stmt->execute([$gameCode]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Jika data belum ada dalam database, masukkan data ke dalam tabel
        if ($result['count'] == 0) {
            $stmt = $conn->prepare("INSERT INTO game_list (game_code, game_name, game_provider, game_type, game_status, game_image) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$game['game_code'], $game['game_name'], $game['game_provider'], $game['game_type'], $game['game_status'], $game['game_image']]);
            echo "Data berhasil dimasukkan: " . $game['game_name'] . "\n";
        } else {
            echo "Data sudah ada dalam database: " . $game['game_name'] . "\n";
        }
    }
} else {
    echo "Respon API tidak valid atau tidak ada data gamelist.\n";
}
?>
