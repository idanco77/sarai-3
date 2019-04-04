<?php

require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
    $userData[] = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    $userData[] = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $userData[] = trim(filter_var($_POST['phone'], FILTER_SANITIZE_STRING));

    if (!in_array(null, $userData)) {
        $phoneRegexp = "/^0(2|3|4|5|8|9)(\d)?\d{7}$/";

        if (mb_strlen($userData[0]) >= 2 && mb_strlen($userData[0]) <= 50) {
            if (preg_match($phoneRegexp, $userData[2])) {

                $dbcon = 'mysql:host=localhost;dbname=idan_landing_pages;charset=utf8';
                $db = new PDO($dbcon, 'portu', 'porty3709');
                $sql = "INSERT INTO sarai3_contacts VALUES('',?,?,?)";
                $query = $db->prepare($sql);

                $mail = new PHPMailer();
                $mail->Charset = 'UTF-8';
                $mail->setFrom('no-reply@idan.work', 'idan');
                $mail->addAddress('Gal.Lavi.10@gmail.com', 'Gal Lavi');
                $mail->Subject = 'new lead - sarai3 landing page';

                $mail->Body = <<<EOT
<body dir="rtl" style="font-family: arial; color: #fff; height: 100%; float: right;">
<div style="background-color: #eaa4ba; border: 3px solid #b398a1; padding: 10px; width: 90%;">
<h3 style="text-align: center; color: #fff;">שלום עידן. יש לך ליד:</h3>
<hr style="border: 1px solid #b398a1">
<table style="width: 100%; border-collapse: collapse;">
<tr>
<td style="border: 2px solid #b398a1; width: 20%"><b>שם הגולש: </b></td>
<td style="border: 2px solid #b398a1">{$userData[0]}</td>
</tr>
<tr>
<td style="border: 2px solid #b398a1; width: 20%"> <b>האימייל של הגולש: </b></td>
<td style="border: 2px solid #b398a1">{$userData[1]}</td>
</tr>
<tr>
<td style="border: 2px solid #b398a1; width: 20%"> <b>הטלפון של הגולש: </b></td>
<td style="border: 2px solid #b398a1">{$userData[2]}</td>
</tr>
</table>
</div>
</body>
EOT;

                $mail->IsHTML(true);
                if ($mail->send()) {
                    echo $query->execute($userData);
                }
            }
        }
    }
}


