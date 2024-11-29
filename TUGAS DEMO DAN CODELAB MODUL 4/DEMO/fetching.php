<?php

header('Content-Type: application/json');


$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "givehub"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    
    echo json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]);
    exit;
}


$sql = "SELECT * FROM donasi"; 
$result = $conn->query($sql);


$donasi = [];
if ($result->num_rows > 0) {
 
    while ($row = $result->fetch_assoc()) {
        $donasi[] = $row; 
    }
} else {
    $donasi = null;
}


$conn->close();


echo json_encode($donasi);
?>
