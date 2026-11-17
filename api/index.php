<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

try {
    if (!is_dir('/tmp/views')) {
        mkdir('/tmp/views', 0755, true);
    }
    
    // Paksa Laravel menggunakan folder /tmp untuk menyimpan cache
    $_ENV['VIEW_COMPILED_PATH'] = '/tmp/views';
    $_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
    $_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';
    $_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
    $_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';
    $_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
    
    require __DIR__ . '/../public/index.php';
    
} catch (\Throwable $e) {
    echo "<div style='padding:20px; background:#ffebeb; color:red; font-family:sans-serif;'>";
    echo "<h2>Kena Kau! Ini Error Aslinya:</h2>";
    echo "<strong>Pesan:</strong> " . $e->getMessage() . "<br><br>";
    echo "<strong>File:</strong> " . $e->getFile() . " (Baris: " . $e->getLine() . ")<br><br>";
    echo "</div>";
}