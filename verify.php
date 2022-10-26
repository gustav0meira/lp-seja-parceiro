<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$telefone = $_REQUEST['telefone'];
$estado = $_REQUEST['estado'];

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.umbler.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'contato@universaeletrica.com';
$mail->Password = 'Apk@103010';
$mail->setFrom('contato@universaeletrica.com', 'Eletricista Parceiro');
$mail->addAddress('pedidosuniversaeletrica@gmail.com', 'Pedidos Universa');
$mail->addAddress('vitorpimentel37@gmail.com', 'Pedidos Universa');
$mail->addAddress('lorenauniversaeletrica@gmail.com', 'Lorena Universa');
$mail->Subject = 'Eletricista Parceiro';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'Novo Eletricista cadastrado: <br><br> Nome: '.$nome.' <br> E-mail: '.$email.' <br> Telefone: '.$telefone.' <br> Estado: '.$estado.'.';
if (!$mail->send()) {
    echo '<script>window.location.href="./"</script>';
} else {
    echo '<script>alert("Ficamos felizes em seu interesse! Logo entraremos em contato! :)");</script>';
    echo '<script>window.location.href="./"</script>';
}
?>