<?php
     require '../../action/config.php';
     include 'functionAPI.php';

     header('WWW-Authenticate: Basic realm="Test Authentication System"');
     header('Content-Type: application/json; charset=UTF-8');
     
     if($_SERVER['REQUEST_METHOD'] == 'GET'){
          if(isset($_SERVER['PHP_AUTH_USER']) AND isset($_SERVER['PHP_AUTH_PW'])) {
                    $dataLogin = loginDonaturAPI($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
                    if($dataLogin) {
                         http_response_code(200);
                         $result = daftarPerpustakaanAPI($dataLogin['email_donatur']);
                         
                         $data = [];
                         while($dataJSON = mysqli_fetch_assoc($result)){
                              $data[] = $dataJSON;
                         }
                         echo json_encode($data);
                    } else {
                              echo "Gagal, Data Tidak Ada";
                    }
          } else {
                    echo "Gagal Request";
          }
     }
?>