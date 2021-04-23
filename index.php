<html style="height:100%">
  <?php

    require_once __DIR__ . '/config.php';
    error_reporting(0);
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "on" ? "https" : "http" . "://";
    $fileurl = $protocol . domain . images . "/$hash.$type";

    function human_filesize($bytes, $decimals) {
        $size = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f ", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    $files = scandir(images . '/');

    if (isset($_GET["f"])) {

      $string = $_GET["f"];
      $type = strrchr($string, '.');
      $type = str_replace(".","",$type);

      foreach ($files as $file) {
        if ($file == $_GET["f"]) {

          $filesize = human_filesize(filesize(images . "/" . $_GET["f"]), 2);
          ?>
            <head>
              <title><?php echo toptitle; ?></title>
              <meta name='og:site_name' content='<?php echo toptitle ?>'>
              <?php if ($type == "png" || $type == "gif" || $type == "jpeg" || $type == "jpg"): ?>
                <meta name='twitter:card' content='summary_large_image'>
                <meta name='twitter:title' content='<?php echo title; ?>'>
                <meta content='<?php echo description; ?>' property="og:description">
                <meta name='twitter:image' content='<?php echo $protocol . domain . "/" . images . "/" . $_GET["f"]; ?>'>
              <?php elseif ($type == "mp4" || $type == "webm"): ?>
                <meta name='twitter:card' content='player'>
                <meta content='<?php echo description; ?>' property="og:description">
                <meta name='twitter:title' content='<?php echo title; ?>'>
                <meta name='twitter:player' content='<?php echo $protocol . domain . "/" . images . "/" . $_GET["f"]; ?>'>
                <meta name='twitter:player:width' content='1280'>
                <meta name='twitter:player:height' content='720'>               
              <?php else: ?>
                <meta name='twitter:card' content='suummary_large_image'>
                <meta content='<?php echo description; ?>' property="og:description">
                <meta name='twitter:title' content='<?php echo title; ?>'>
              <?php endif; ?>
              <meta name="theme-color" content="#<?php echo color; ?>">
            </head>

      
            
            <body style="margin: 0px;background: #0e0e0e;display:flex;justify-content:center;height:100%">
              <?php if ($type == "png" || $type == "gif" || $type == "jpeg" || $type == "jpg"): ?>
                <img style="-webkit-user-select:none;margin:auto" src='<?php echo $protocol . domain . "/" . images . "/". $_GET["f"]; ?>'></img>
              <?php elseif ($type == "mp4" || $type == "webm"): ?>
                <video controls>
                <img style="-webkit-user-select:none;margin:auto" src='<?php echo $protocol . domain . "/" . images . "/". $_GET["f"]; ?>'></img>
                </video>
              <?php elseif ($type == "mp3" || $type == "ogg"): ?>
                <audio controls>
                <img style="-webkit-user-select:none;margin:auto" src='<?php echo $protocol . domain . "/" . images . "/". $_GET["f"]; ?>'></img>>
                </audio>
              <?php else: ?>
                <button><a style="-webkit-user-select:none;margin:auto" href='<?php echo $protocol . domain . "/" . images . "/". $_GET["f"]; ?>' download>Download</a></button>
              <?php endif; ?>
            </body>

          <?php
        }
      }
    } else { ?>
    <!DOCTYPE html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="<?php echo title; ?>" property="og:title">
    <meta property="og:image" content="https://media.discordapp.net/attachments/773617525782216744/773968781861060608/ezgif-6-06fd4bfe9b71_1.gif">
    <meta name="twitter:card" content="summary_large_image">
    <meta content='Image Hoster Online ✔️' property="og:description">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#<?php echo color; ?>">
    <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title><?php echo title; ?></title>
          <link rel="stylesheet" href="style.css">
    </head>
    <body>
          <div class="nav-wrapper">
                <nav>
                      <a href="https://github.com/eozri" class="hover-this"><span>GitHub</span></a>
                      <a href="https://github.com/eozri/Sharex-Img-Uploader" class="hover-this"><span>Sharex Uploader</span></a>
                      <a href="https://discord.com/users/804066223741730836" class="hover-this"><span>My Discord</span></a>
                      <div class="cursor"></div>
                </nav>
          </div>

    <script>

    (function () {

          const link = document.querySelectorAll('nav > .hover-this');
          const cursor = document.querySelector('.cursor');

          const animateit = function (e) {
                const span = this.querySelector('span');
                const { offsetX: x, offsetY: y } = e,
                { offsetWidth: width, offsetHeight: height } = this,

                move = 25,
                xMove = x / width * (move * 2) - move,
                yMove = y / height * (move * 2) - move;

                span.style.transform = `translate(${xMove}px, ${yMove}px)`;

                if (e.type === 'mouseleave') span.style.transform = '';
          };

          const editCursor = e => {
                const { clientX: x, clientY: y } = e;
                cursor.style.left = x + 'px';
                cursor.style.top = y + 'px';
          };

          link.forEach(b => b.addEventListener('mousemove', animateit));
          link.forEach(b => b.addEventListener('mouseleave', animateit));
          window.addEventListener('mousemove', editCursor);

    })();

    </script>
    </body>
    </html>
    <?php }
    

  ?>
</html>