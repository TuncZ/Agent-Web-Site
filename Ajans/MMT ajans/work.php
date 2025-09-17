<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/normalize.css" />
  <link
  rel="icon"
  href="./images/AJANS.png"
  type="image/x-icon"
  
/>
  <title>MMT AJANS</title>
</head>

<body>
  <header>
    <div class="logo"> <img src="./images/AJANS.png" width="50px" height="50px" alt=""> MMT AJANS</div>
    <div class="toggle"></div>
    <div class="navigation">
      <ul>
        <li><a href="index.php">Ana Sayfa</a></li>
        <li><a href="services.php">Servis</a></li>
        <li><a href="work.php">Çalışma Alanları</a></li>
        <li><a href="contact.php">İletişim</a></li>
      </ul>
      <div class="social-bar">
        <ul>
          <li>
            <a href="https://facebook.com">
              <img src="images/facebook.png" target="_blank" alt="" />
            </a>
          </li>
          <li>
            <a href="https://twitter.com">
              <img src="images/twitter.png" target="_blank" alt="" />
            </a>
          </li>
          <li>
            <a href="https://instagram.com">
              <img src="images/instagram.png" target="_blank" alt="" />
            </a>
          </li>
        </ul>
        <a href="mailto:you@email.com" class="email-icon">
          <img src="images/email.png" alt="" />
        </a>
      </div>
    </div>
  </header>


  <section>
    <div class="title">
      <h1>En iyi çalışmalarımızdan bazıları</h1>
      <p>
        En iyi işlerimiz arasında, yaratıcılığımızı ve uzmanlığımızı birleştirerek ortaya koyduğumuz özgün projeler
        bulunmaktadır. Her biri özenle tasarlanmış ve müşteri ihtiyaçlarına özel geliştirilmiş bu projeler, şirketimizin
        kalite standartlarını temsil eder. Müşteri memnuniyetini odak noktamız haline getirerek, her işimizde benzersiz
        ve etkileyici sonuçlar elde etmek için çabalıyoruz. Portföyümüz, çeşitli sektörlerden gelen müşterilerimize
        sunduğumuz çeşitli hizmetleri ve başarı hikayelerimizi yansıtmaktadır
      </p>
    </div>

    <style>
        .portfolio {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .item {
            flex: 0 1 calc(33.33% - 20px);
            max-width: calc(33.33% - 20px);
        }

        .item img {
            width: 100%;
            height: auto;
        }
        .action {
          color: snow;
        }
    </style>
</head>
<body>
    <h2>Portföy</h2>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajans";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$sqlSelect = "SELECT id, resim, aciklama FROM resim";
$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) {
    echo '<div class="portfolio">';
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        echo '<div class="item">';
        echo '<img src="' . $row['resim'] . '" alt="Portföy Resmi">';
        
        echo '<div class="action">';
            
            if (isset($row['aciklama'])) {
                echo '<p>' . $row['aciklama'] . '</p>';
            } else {
                echo '<p>Aciklama bulunamadı.</p>';
            }
        echo '</div>';

        echo '</div>';

        $count++;

        
        if ($count % 9 == 0) {
            echo '</div><div class="portfolio">';
        }
    }

    
    echo '</div>';
} else {
    echo "Mevcut resim bulunamadı.";
}

$conn->close();
?>


    </div>
  </section>

  <script src="js/script.js"></script>
</body>

</html>