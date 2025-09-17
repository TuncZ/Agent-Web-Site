<?php
include 'db.php';

$query = "SELECT * FROM ulasim";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Sorgu hatası: " . mysqli_error($conn));
}

// Silme işlemi
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["sil"])) {
    $sil_id = $_GET["sil"];
    
    // 'id' anahtarının dizide var olup olmadığını kontrol et
    if (is_numeric($sil_id)) {
        $sil_query = "DELETE FROM ulasim WHERE id = $sil_id";
        
        if (mysqli_query($conn, $sil_query)) {
            echo "Kayıt başarıyla silindi!";
            // İşlem tamamlandıktan sonra sayfayı yenilemek için aşağıdaki satırı ekleyin
            header("Refresh: 2; URL=form.php");
        } else {
            echo "Silme hatası: " . mysqli_error($conn);
        }
    } else {
        echo "Geçersiz ID parametresi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/form.css">
    <title>Form Görme</title>
</head>

<body>
<nav class="row"> <div class="title-container">
            <a href="admin.php">Portfolyo</a>
            <a href="form.php">Formlar</a></div>
        </nav>
    <div class="ilan">
        <main class="row">
            <h1></h1>

            <table border="" style="width:100%">
                <tr>
                    <th>ad</th>
                    <th>soyad</th>
                    <th>mail</th>
                    <th>konu </th>
                    <th>mesaj</th>
                   
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";

                    echo "<td>" . $row['ad'] . "</td>";
                    echo "<td>" . $row['soyad'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['konu'] . "</td>";
                    echo "<td>" . $row['mesaj'] . "</td>";
                    echo "<td><a class='delete-link' href='?sil=" . $row['id'] . "'>Sil</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </main>
    </div>
</body>

</html>
