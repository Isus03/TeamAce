<?php
use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';
if(isset($_POST['email']) && $_POST['email'] != '') {
  if (isset($_POST['submit'])) {
    $ime = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
  }

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'tor38502003@gmail.com';
      // Gmail Password
      $mail->Password = 'Luka2003.';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom('tor38502003@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('477khii@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = 'Contact form';
      $mail->Body = "<h3>Ime : $ime <br>Email : $email <br>Phone : $phone <br> Message : $message </h3>";

      $mail->send();
      $output = '<div class="alert alert-success">
                  <h5>Hvala vam, javimo se uskoro!</h5>
                </div>';
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }
header("Location: https://teamaceweb.com/dist/final.html");
exit()
?>