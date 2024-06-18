<?php
use PHPMailer\PHPMailer\PHPMailer; // Importowanie klasy PHPMailer
use PHPMailer\PHPMailer\SMTP;      // Importowanie klasy SMTP
use PHPMailer\PHPMailer\Exception; // Importowanie klasy Exception

// Usunięcie ręcznego ładowania PHPMailera
/*
require 'C:/xampp/htdocs/blog-numizmatyczny/PHPMailer/src/DSNConfigurator.php'; // Ładowanie pliku DSNConfigurator.php
require 'C:/xampp/htdocs/blog-numizmatyczny/PHPMailer/src/Exception.php';      // Ładowanie pliku Exception.php
require 'C:/xampp/htdocs/blog-numizmatyczny/PHPMailer/src/OAuth.php';          // Ładowanie pliku OAuth.php
require 'C:/xampp/htdocs/blog-numizmatyczny/PHPMailer/src/OAuthTokenProvider.php'; // Ładowanie pliku OAuthTokenProvider.php
require 'C:/xampp/htdocs/blog-numizmatyczny/PHPMailer/src/PHPMailer.php';      // Ładowanie pliku PHPMailer.php
require 'C:/xampp/htdocs/blog-numizmatyczny/PHPMailer/src/POP3.php';           // Ładowanie pliku POP3.php
require 'C:/xampp/htdocs/blog-numizmatyczny/PHPMailer/src/SMTP.php';           // Ładowanie pliku SMTP.php
*/

// Ładowanie autoloadera Composer'a
require 'vendor/autoload.php';

$mail = new PHPMailer(true); // Utworzenie nowej instancji PHPMailera z obsługą wyjątków

try {
    // Ustawienia serwera SMTP
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Włączenie szczegółowego debugowania
    $mail->isSMTP();                                            // Ustawienie wysyłki przez SMTP
    $mail->Host       = 'smtp.example.com';                     // Ustawienie serwera SMTP
    $mail->SMTPAuth   = true;                                   // Włączenie autoryzacji SMTP
    $mail->Username   = 'your-email@example.com';               // Nazwa użytkownika SMTP
    $mail->Password   = 'your-password';                        // Hasło SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Włączenie szyfrowania TLS; można użyć też `PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Port       = 465;                                    // Port TCP do połączenia

    // Odbiorcy
    $mail->setFrom('from@example.com', 'Mailer');               // Ustawienie adresu nadawcy
    $mail->addAddress('recipient@example.net', 'Joe User');     // Dodanie odbiorcy
    $mail->addReplyTo('info@example.com', 'Information');       // Ustawienie adresu do odpowiedzi
    $mail->addCC('cc@example.com');                             // Dodanie kopii wiadomości
    $mail->addBCC('bcc@example.com');                           // Dodanie ukrytej kopii wiadomości

    // Załączniki
    $mail->addAttachment('/var/tmp/file.tar.gz');               // Dodanie załącznika
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');          // Opcjonalna nazwa załącznika

    // Treść wiadomości
    $mail->isHTML(true);                                        // Ustawienie formatu wiadomości na HTML
    $mail->Subject = 'Oto temat wiadomości';                    // Ustawienie tematu wiadomości
    $mail->Body    = 'To jest treść wiadomości HTML <b>pogrubiona!</b>'; // Treść wiadomości w formacie HTML
    $mail->AltBody = 'To jest treść wiadomości w formacie zwykłym tekstem dla klientów nieobsługujących HTML'; // Alternatywna treść wiadomości dla klientów bez obsługi HTML

    $mail->send();                                              // Wysłanie wiadomości
    echo 'Wiadomość została wysłana';                            // Wyświetlenie komunikatu o sukcesie
} catch (Exception $e) {
    echo "Wiadomość nie mogła zostać wysłana. Błąd mailera: {$mail->ErrorInfo}"; // Obsługa błędu wysyłki wiadomości
}
?>
