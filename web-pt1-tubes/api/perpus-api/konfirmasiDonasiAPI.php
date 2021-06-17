<?php 
     require '../../action/config.php';
     include 'functionAPI.php';

     header('WWW-Authenticate: Basic realm="Test Authentication System"');
     header('Content-Type: application/json; charset=UTF-8');

     if($_SERVER['REQUEST_METHOD'] == 'GET'){
               if(isset($_SERVER['PHP_AUTH_USER']) AND isset($_SERVER['PHP_AUTH_PW'])) {
                         $dataLogin = loginPerpustakaanAPI($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
                         if($dataLogin) {
                                   http_response_code(200);
                                   $result = konfirmasiDonasiAPI($dataLogin['email_perpus']);
                                   $i = 0;
                                   $data = [];
                                   while ($dataJSON = mysqli_fetch_assoc($result)) {
                                        $data[$i] = $dataJSON; 
                                        if ($dataJSON['bukti_donasi'] == "Upload Bukti Donasi" OR $dataJSON['bukti_donasi'] == "") {
                                             $data[$i]['foto_buku'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/BOEBOE-Web.github.io/web-pt1-tubes/'.$dataJSON['foto_buku'];
                                        } else {
                                             $data[$i]['bukti_donasi'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/BOEBOE-Web.github.io/web-pt1-tubes/'.$dataJSON['bukti_donasi'];
                                             $data[$i]['foto_buku'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/BOEBOE-Web.github.io/web-pt1-tubes/'.$dataJSON['foto_buku'];
                                             }
                                        $i++;
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