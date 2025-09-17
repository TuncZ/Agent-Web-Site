<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include("baglanti.php");

    $ad = isset($_POST["ad"]) ? $_POST["ad"] : "";
    $soyad = isset($_POST["soyad"]) ? $_POST["soyad"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $konu = isset($_POST["konu"]) ? $_POST["konu"] : "";
    $mesaj = isset($_POST["mesaj"]) ? $_POST["mesaj"] : "";

    $ekle = "INSERT INTO ulasim (ad, soyad, email, konu, mesaj) VALUES ('$ad', '$soyad', '$email', '$konu', '$mesaj')";

    $calistirekle = mysqli_query($baglanti, $ekle);

    
    if ($calistirekle) {
        $last_inserted_id = mysqli_insert_id($baglanti);
        $success_message = "Formunuz başarıyla gönderildi! ID: $last_inserted_id";
    } else {
        $error_message = "Form gönderilirken bir hata oluştu: " . mysqli_error($baglanti);
    }
}

?>
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
        <div class="logo"><img src="./images/AJANS.png" width="50px" height="50px" alt="">MMT AJANS</div>
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
            <h1>Bize ulaşın</h1>
            <p>
                Bize ulaşın, işbirliği için hazırız! Sizi dinlemek ve projenizin potansiyelini keşfetmek için buradayız.
                Profesyonel ekibimizle, markanızı birlikte zirveye taşıyalım
            </p>
        </div>
        <div class="contact">
            <div class="contact-form">
                <?php if (!empty($success_message)) : ?>
                    <div class="success-message"><?php echo $success_message; ?></div>
                <?php endif; ?>

                <?php if (!empty($error_message)) : ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <form action="contact.php" method="POST">
                    <div class="row">
                        <div class="input50">
                            <input type="text" name="ad" id="ad" placeholder="İsim" />
                        </div>
                        <div class="input50">
                            <input type="text" name="soyad" id="soyad" placeholder="Soyisim" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="input50">
                            <input type="text" name="email" id="email" placeholder="Email" />
                        </div>
                        <div class="input50">
                            <input type="text" name="konu" id="konu" placeholder="Konu" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="input100">
                            <textarea name="mesaj" id="mesaj" placeholder="Mesajınız yazın"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input100">
                            <input type="submit" id="kaydet" value="Gönder" />
                        </div>
                    </div>
                </form>
            </div>

            <div class="contact-info">
                <div class="info-box">
                    <img src="images/address.png" class="contact-icon" alt="" />
                    <div class="details">
                        <h4>Adres</h4>
                        <p>Buya Park Evleri , İstanbul , Türkiye</p>
                    </div>
                </div>
                <div class="info-box">
                    <img src="images/email.png" class="contact-icon" alt="" />
                    <div class="details">
                        <h4>Email</h4>
                        <a href="mailto:anyone@example.com">mehmett.tunc0@gmail.com</a>
                    </div>
                </div>
                <div class="info-box">
                    <img src="images/call.png" class="contact-icon" alt="" />
                    <div class="details">
                        <h4>Telefon</h4>
                        <a href="tel:+19785555555">+90 546 598 4483</a>
                        <a href="tel:+19784444444">+90 546 598 4483</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>

</html>
