<?php

  require_once __DIR__ . '/config.php';

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "on" ? "https" : "http" . "://";
  $hash = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 8);

  if ( ! isset($_POST['password']) || $_POST['password'] !== pass) {
      die('Incorrect password.');
  }

  if(!empty($_FILES['file'])) {
    $type = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $fileurl = $protocol . domain . images . "/$hash.$type";
    $filelocation = __DIR__ . images . "/$hash.$type";
    if(move_uploaded_file($_FILES['file']['tmp_name'], images . "/$hash.$type")) {
      if (embed == true) {
        echo $protocol . domain . "/?f=$hash.$type";
      } else {
        echo $protocol . domain . images . "/$hash.$type";
      }
    } else {
        echo "Failed to upload your file.";
    }
  }

?>