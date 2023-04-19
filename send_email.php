<?php
if(isset($_POST['email'])) {
 
    // Здесь указываются данные для отправки письма
    $email_to = "akimovpavel0@gmail.com";
    $email_subject = "Новое сообщение от сайта";
 
    function died($error) {
        echo "Извините, но были найдены ошибки в вашей форме. ";
        echo "Эти ошибки выделены красным цветом.<br><br>";
        echo $error."<br><br>";
        echo "Пожалуйста, вернитесь и исправьте эти ошибки.<br><br>";
        die();
    }
 
    // проверка полей формы на ошибки
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])) {
        died('Извините, но есть проблема с формой, которую вы отправили.');       
    }
 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
 
    $email_message = "Детали сообщения ниже:\n\n";
    $email_message .= "Имя: ".$name."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "Тема: ".$subject."\n";
    $email_message .= "Сообщение:\n".$message."\n";
 
// создание email-сообщения и его отправка
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
 
// Перенаправление на страницу "Спасибо" после отправки сообщения
header("Location: thank_you_page.html");
}
?>
