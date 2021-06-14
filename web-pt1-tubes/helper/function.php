<?php

function headerHTML(array $style){
          echo'
          <!DOCTYPE html>
          <html lang="id">
          
          <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>BoeBoe - Web Donasi Buku Bekas</title>
              <link rel="icon" href="../image/icon-b.png">
              <link rel="preconnect" href="https://fonts.gstatic.com">
              <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
              <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
                  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
              </script>

              <link rel="stylesheet" href="'.$style[0].'">
              <link rel="stylesheet" href="'.$style[1].'">
          </head>';
}

function footerHTML($script = ""){
          echo'
                    <footer>
                              <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
                              <p>Made by OTAKU<br>(Orang-orang pecinTA buKU)</p>
                    </footer>
                    '.$script.'
                    </body>
          </html>';
}

?>