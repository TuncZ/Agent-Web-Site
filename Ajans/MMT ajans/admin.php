<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Portfolyo İşlemleri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .title-container{
            background-color: #333;
        }
        nav {
    background-color: #333;
    padding: 10px;
    text-align: center;
}

 nav a {
    color: white;
    text-decoration: none;
    padding: 10px;
    margin: 0 10px;
    border-radius: 5px;
} 
        h2 {
            color: #343a40;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            max-width: 400px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #343a40;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #343a40;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #23272b;
        }

        h3 {
            color: #343a40;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        div {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: inline-block;
            margin: 10px;
            text-align: left;
        }

        a {
            color: #dc3545;
            text-decoration: none;
            margin-left: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<nav class="row"> <div class="title-container">
            <a class="abc" href="admin.php">Portfolyo</a>
            <a class="abc" href="form.php">Formlar</a></div>
        </nav>
    <h2><img src="./images/AJANS.png" width="50px" height="50px" alt="">Portfolyo İşlemleri</h2>
    Örnek resim kodları ./images/portfolio-item1.jpg

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ajans";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    if (isset($_POST['edit_id']) && isset($_POST['edit_url']) && isset($_POST['edit_aciklama'])) {
        $editID = $_POST['edit_id'];
        $editURL = $_POST['edit_url'];
        $editAciklama = $_POST['edit_aciklama'];
    
        $sqlUpdate = "UPDATE resim SET resim = '$editURL', aciklama = '$editAciklama' WHERE id = $editID";
        
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "Resim başarıyla güncellendi.";
            header("Location: admin.php");
            exit();
        } else {
            echo "Güncelleme hatası: " . $conn->error;
        }
    }

    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        $deleteID = $_GET['delete'];
        $sqlDelete = "DELETE FROM resim WHERE id = $deleteID";
        if ($conn->query($sqlDelete) === TRUE) {
            echo "Resim başarıyla silindi.";
            header("Location: admin.php");
        } else {
            echo "Silme hatası: " . $conn->error;
        }
    }

    if (isset($_POST['edit_id']) && isset($_POST['edit_url'])) {
        $editID = $_POST['edit_id'];
        $editURL = $_POST['edit_url'];
        $sqlUpdate = "UPDATE resim SET resim = '$editURL' WHERE id = $editID";
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "Resim başarıyla güncellendi.";
            
           
            header("Location: admin.php");
            exit();
        } else {
            echo "Güncelleme hatası: " . $conn->error;
        }
    }
    ?>

<form action="admin.php" method="post">
    <label for="resim_url">Resim URL:</label>
    <input type="text" name="resim_url" required>
    <label for="aciklama">Açıklama:</label>
    <input type="text" name="aciklama" required>
    <input type="submit" value="Resmi Ekle">
</form>


    <h3>Mevcut Portfolyolar:</h3>
    <?php
    $sqlSelect = "SELECT id, resim FROM resim";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div>';
            echo '<img src="' . $row['resim'] . '" alt="Resim">';
            
            echo '<form action="admin.php" method="post">';
            echo '<input type="hidden" name="edit_id" value="' . $row['id'] . '">';
            echo '<label for="edit_url">Yeni URL:</label>';
            echo '<input type="text" name="edit_url" required>';
            echo '<label for="edit_aciklama">Yeni Açıklama:</label>';
            echo '<input type="text" name="edit_aciklama" required>';
            echo '<input type="submit" value="Düzenle">';
            echo '</form>';
            echo '<a href="admin.php?delete=' . $row['id'] . '">Sil</a>';
            echo '</div>';
        }
    } else {
        echo "Mevcut resim bulunamadı.";
    }

    $conn->close();
    ?>
</body>
</html>
