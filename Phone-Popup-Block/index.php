<!DOCTYPE html>
<html>
<head>
    <title>Задачи с данными</title>
    <!-- подключение стилей -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

 <!-- Задача с номером телефона -->
    <h1 style="margin-left:30%;">Определение номера телефона</h1>
    <form style="margin-left:30%;" method="post" action="">

    <label for="phone">Введите номер телефона:</label>

    <input type="text" id="phone" name="phone" placeholder="+375(29)123-45-67" required>

    <button type="submit">Проверить</button>

</form>

<!-- нативный php -->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $phone = $_POST['phone'];

    $json = file_get_contents('https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json');
    
    $phoneCodes = json_decode($json, true);

    $country = '';

    foreach ($phoneCodes as $code => $countryData) {

        foreach ($countryData['examples'] as $example) {
            if (preg_match('/(\d{1,})(.*)/', $phone, $matches)) {
                $number = $matches[1];
                if ($number === $example) {
                    $country = $countryData['name'];
                    break 2;
                }
            }
        }
    }

    echo "Номер телефона $phone относится к стране: $country";
}

?>

 <!-- задача с попапом и куками -->

    <div class="cookie-popup" id="cookiePopup">
        На этом сайте используются куки. Нажмите "Принять", чтобы закрыть это уведомление.
        <button id="acceptCookies" class="btn btn-primary">Принять</button>
        <button id="closePopup" class="btn btn-secondary">Закрыть</button>
    </div>

 <!-- задача с блоком услуги http://joxi.ru/L21EPzvsDg1Oq2 -->
    <div style="margin-top:10px;" class="container">
    <h1 style="margin-bottom:50px;">Usługi specjalne</h1>
      <div class="row">
        <div class="col-md-6">
            <div class="service-block">
                <img src="Frame 1884.png"></img>
                <h2>Etykietowanie</h2>
                <p>Usługi dodatkowe</p>
                <a href="#" class="button">Więcej</a><span style="color:#78599C;margin-left:10px; font-size: 30px">&rarr;</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="service-block">
                <img src="Frame 1884.png"></img>
                <h2>Insertowanie</h2>
                <p>Insertowanie</p>
                <a href="#" class="button">Więcej</a><span style="color:#78599C;margin-left:10px; font-size: 30px">&rarr;</span>
            </div>
        </div>
      </div>
    </div>

 <!-- подключение js скрипта -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
