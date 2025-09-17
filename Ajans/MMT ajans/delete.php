<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajans";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "SELECT resim FROM resim WHERE id = $id";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dosyaAdi = $row['resim'];

        
        $sqlDelete = "DELETE FROM resim WHERE id = $id";

        
        if ($conn->query($sqlDelete) === TRUE) {
            
            $dosyaYolu = "uploads/" . $dosyaAdi;
            
            
            if (file_exists($dosyaYolu)) {
                unlink($dosyaYolu);
                echo "Resim ve dosya başarıyla silindi.";
            } else {
                echo "Dosya bulunamadığı için sadece veritabanından silindi.";
            }
        } else {
            echo "Silme hatası: " . $conn->error;
        }
    } else {
        echo "Resim bulunamadı.";
    }
} else {
    echo "Geçersiz parametre.";
}


$conn->close();
?>
