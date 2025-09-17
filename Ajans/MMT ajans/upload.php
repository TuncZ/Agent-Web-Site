<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajans";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$resimURL = $_POST['resim_url'];
$aciklama = $_POST['aciklama']; 


$sql = "INSERT INTO resim (resim, aciklama) VALUES ('$resimURL', '$aciklama')";
if ($conn->query($sql) === TRUE) {
    echo "Resim ve açıklama başarıyla eklendi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
