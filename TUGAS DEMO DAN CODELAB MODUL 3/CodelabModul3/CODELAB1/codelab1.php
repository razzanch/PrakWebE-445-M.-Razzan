<?php

$char = '*';
$height = 5;

// Cek apakah sedang dijalankan di lingkungan web atau terminal
$newline = (php_sapi_name() === 'cli') ? "\n" : "<br>";
$space = (php_sapi_name() === 'cli') ? " " : "&nbsp;";

echo "Perulangan Segitiga Sama Sisi" . $newline;

for($i = 1; $i <= $height; $i++) {
    for($j = 1; $j <= $height - $i; $j++) {
        echo $space;
    }

    for($j = 1; $j <= (2 * $i - 1); $j++) {
        echo $char;
    }
    
    echo $newline;
}

echo $newline . "Perulangan Segitiga Sama Sisi Terbalik" . $newline;

for($i = $height; $i >= 1; $i--) {
    for($j = 1; $j <= $height - $i; $j++) {
        echo $space;
    }
    
    for($j = 1; $j <= (2 * $i - 1); $j++) {
        echo $char;
    }
        
    echo $newline;
}
?>
