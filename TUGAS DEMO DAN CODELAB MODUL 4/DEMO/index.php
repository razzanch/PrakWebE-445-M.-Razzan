<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "givehub";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nama_donasi = trim($_POST['nama_donasi']);
    $lokasi_donasi = trim($_POST['lokasi_donasi']);
    $nama_yayasan = trim($_POST['nama_yayasan']);
    $gambar = filter_var(trim($_POST['gambar']), FILTER_VALIDATE_URL);
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

   
    if (empty($nama_donasi) || empty($lokasi_donasi) || empty($nama_yayasan) || !$gambar || empty($tanggal_mulai) || empty($tanggal_selesai)) {
        echo "Harap isi semua field dengan benar.";
    } else {
       
        $sql = "INSERT INTO donasi (nama_donasi, lokasi_donasi, nama_yayasan, gambar, tanggal_mulai, tanggal_selesai)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $nama_donasi, $lokasi_donasi, $nama_yayasan, $gambar, $tanggal_mulai, $tanggal_selesai);

        if ($stmt->execute()) {
          
            echo "<script>
                    alert('Donasi berhasil ditambahkan!');
                    window.location.href = 'HOME/home.html';
                  </script>";
            exit(); 
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
