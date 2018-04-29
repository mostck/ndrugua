<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {$name = $_POST['name'];}
    if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
    if (isset($_POST['city'])) {$city = $_POST['city'];}
    if (isset($_POST['date'])) {$date = $_POST['date'];}
    if (isset($_POST['text'])) {$text = $_POST['text'];}
    if (isset($_POST['zbroya'])) {$zbroya = $_POST['zbroya'];}
    if (isset($_POST['ato'])) {$ato = $_POST['ato'];}
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}

    $to = "ndrugua@gmail.com"; /*Укажите адрес, на который должно приходить письмо*/
    $sendfrom   = "skarga@ndrugua.org"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    $message = "$formData<br> <b>Ім'я:</b> $name <br><b>Місто:</b> $city <br><b>Дата народження:</b> $date <br><b>Повідомлення:</b> $text <br><b>Телефон:</b> $phone <br> <b>Зброя:</b> $zbroya <br><b>АТО:</b> $ato  ";
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
    echo '<center><p class="success">Ми отримали повідомлення. Вам зателефонують найближчим часом!</p></center>';
    }
    else 
    {
    echo '<center><p class="fail"><b>Помилка. Повідомлення не відправлене!</b></p></center>';
    }
} else {
    http_response_code(403);
    echo "Спробуйте ще раз";
}
?>