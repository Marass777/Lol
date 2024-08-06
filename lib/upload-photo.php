<?php
session_start();

function random_string() {
  $chars = "abcdefghijklmopqrstuvwxyz0123456789";
  $new = "";

  for ($i = 0; $i < 5; $i++) {
    $new .= $chars[rand(0, strlen($chars))];
  }

  return $new;
}

$uniqueid = $_SESSION["unique_id"] = random_string();
$counter = 1;
$_SESSION["file_names"] = array();

// Upload File
foreach ($_FILES as $file) {
  if ($file["name"] != "") {
    $fileTmpName = $file["tmp_name"];
    $fileName = $file["name"];
    $fileType = explode(".", $fileName)[1];

    // $_SESSION["file_name"] = array("identity$counter.$fileType");
    array_push($_SESSION["file_names"], "identity$counter.$fileType");

    $path = "images/$uniqueid/identity$counter.$fileType";

    if (!is_dir("images/$uniqueid")) {
      mkdir("images/$uniqueid", 0777);
    }

    move_uploaded_file($fileTmpName, $path);
    $counter++;
  }
}

if ($counter == 3) { // this means user has picked drivers licence
  $_SESSION["drivers_licence"] = true;
}

header("Location: ../processing.php");

?>
