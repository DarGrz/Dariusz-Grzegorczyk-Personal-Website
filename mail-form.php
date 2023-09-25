<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/dzp-favicon.ico">
    <title>Dom z Pompą | Dziękujemy za wysłanie wiadomości</title>
</head>
<body>
    
</body>
</html>





<?php



$twojemail = "kontakt@dariuszgrzegorczyk.pl"; //na jaki adres ma zostać wysłana treść z formularza
$blad=0;

if (isset($_POST['submit'])) {

            // filtrowanie treści wprowadzonych przez użytkownika
            
            $name = htmlspecialchars(stripslashes(strip_tags(trim($_POST["name"]))), ENT_QUOTES);
            $email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
            $message = htmlspecialchars(stripslashes(strip_tags(trim($_POST["message"]))), ENT_QUOTES);
           

            // sprawdzamy czy wszystkie pola zostały wypełnione
            if (!$name) {
                $blad++;
                echo '<p class="blad">Proszę wpisać swoje imię.</p>';
            }
            if (!$email) {
                $blad++;
                echo '<p class="blad">Proszę wpisać swój adres e-mail.</p>';
            }
            if (!$message) {
                $blad++;
                echo '<p class="blad">Proszę wpisać treść wiadomości.</p>';
            }
            
            // jeżeli nie ma błędu, to wiadomość e-mail zostaje wysłana
            if ($blad == 0) {

                // niezbędne nagłówki do wyświetlania wiadomości HTML
                $naglowki = "MIME-Version: 1.0" . "\r\n";
                $naglowki .= "Content-type:text/html;charset=utf-8" . "\r\n";

                // opcjonalne nagłówki
                $naglowki .= 'From: <'.$email.'>' . "\r\n";
                $naglowki .= 'Cc: <'.$twojemail.'>' . "\r\n";

                // całkowita treść wiadomości
                $message = nl2br($message);
                $wiadomosc = <<< KONIEC
                <html>
                    <p><strong>Imię i nazwisko:</strong> $name</p>
                    
                    <p><strong>E-mail:</strong> $email</p>
                    
                    <p><strong>Wiadomość:</strong><br /> $message</p>
                </html>
KONIEC;
                // wysyłanie wiadomości e-mail
                $wynik = mail('<'.$twojemail.'>', $temat, $wiadomosc, $naglowki);

                // komunikat potwierdzający wysłanie wiadomości bądź nie
                if ($wynik) {
                    echo '

                    <div class="section-title">
                        <p></p>
                        <p></p>
                        <h2>Dziękujemy</h2>
                        <p><Strong>Wiadomość została wysłana</strong></p>
                        <p>Za chwilę nastąpi przekierowanie na stronę startową.</p>
                    </div>';
                } else {
                    echo '
                    <div class="section-title">
                        <h2>blad</h2>
                    </div>';
                }
            }

        }

        header("refresh:3, url=index.html");
?>
