<?php
header("Content-Type: application/json");
include_once 'database.php';


$method = $_SERVER['REQUEST_METHOD'];


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri);
$id_donasi = isset($uri_segments[3]) ? $uri_segments[3] : null;


switch ($method) {
    case 'GET':
        if ($id_donasi) {
           
            get_donation_by_id($id_donasi);
        } else {
            
            get_all_donations();
        }
        break;
    case 'POST':
        
        create_donation();
        break;
    case 'PUT':
        
        update_donation($id_donasi);
        break;
    case 'DELETE':
        
        delete_donation($id_donasi);
        break;
    default:
        echo json_encode(["message" => "Method not allowed"]);
        break;
}


function get_all_donations() {
    global $conn;
    $sql = "SELECT * FROM donasi";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $donations = [];
        while ($row = $result->fetch_assoc()) {
            $donations[] = $row;
        }
        echo json_encode($donations);
    } else {
        echo json_encode(["message" => "No donations found"]);
    }
}


function get_donation_by_id($id_donasi) {
    global $conn;
    $sql = "SELECT * FROM donasi WHERE id_donasi = $id_donasi";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $donation = $result->fetch_assoc();
        echo json_encode($donation);
    } else {
        echo json_encode(["message" => "Donation not found"]);
    }
}


function create_donation() {
    global $conn;
    $data = json_decode(file_get_contents("php://input"), true);


    $nama_donasi = $data['nama_donasi'];
    $lokasi_donasi = $data['lokasi_donasi'];
    $nama_yayasan = $data['nama_yayasan'];
    $gambar = $data['gambar'];
    $tanggal_mulai = $data['tanggal_mulai'];
    $tanggal_selesai = $data['tanggal_selesai'];

    
    $stmt = $conn->prepare("INSERT INTO donasi (nama_donasi, lokasi_donasi, nama_yayasan, gambar, tanggal_mulai, tanggal_selesai) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nama_donasi, $lokasi_donasi, $nama_yayasan, $gambar, $tanggal_mulai, $tanggal_selesai);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Donation created successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $stmt->error]);
    }
    $stmt->close();
}



function update_donation($id_donasi) {
    global $conn;
    $data = json_decode(file_get_contents("php://input"), true);

    $nama_donasi = $data['nama_donasi'];
    $lokasi_donasi = $data['lokasi_donasi'];
    $nama_yayasan = $data['nama_yayasan'];
    $gambar = $data['gambar'];
    $tanggal_mulai = $data['tanggal_mulai'];
    $tanggal_selesai = $data['tanggal_selesai'];

    $sql = "UPDATE donasi SET 
            nama_donasi = '$nama_donasi',
            lokasi_donasi = '$lokasi_donasi',
            nama_yayasan = '$nama_yayasan',
            gambar = '$gambar',
            tanggal_mulai = '$tanggal_mulai',
            tanggal_selesai = '$tanggal_selesai'
            WHERE id_donasi = $id_donasi";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Donation updated successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
}


function delete_donation($id_donasi) {
    global $conn;
    $sql = "DELETE FROM donasi WHERE id_donasi = $id_donasi";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Donation deleted successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
}
?>
