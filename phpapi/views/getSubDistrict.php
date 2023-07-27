<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
    header("Access-Control-Allow-Headers: X-Reqested-With");
    header("Content-Type: application/json");

    require_once(__DIR__."/db/dbConnect.php");
    $province = new DataBase();

    $header = apache_request_headers();
    // echo json_encode($header);
    if($header["userId"] == 'Root' && $header["userPass"] == '123456' && $header["systemId"] == 'Register'){
      $api = $_SERVER["REQUEST_METHOD"];
            if($api == "GET"){
                $data['status'] =1;
                $data['data'] = $province->query("select * from subdistricts order by id asc");
                echo json_encode($data);
            }
        }else{
            $msg['status'] = "0";
            $msg['message'] = "Invalid Request";
            echo json_encode($msg);
         }
    // $a = base64_encode($header["userId"].":".$header["userPass"]);
    // echo ($a);
    // echo(base64_decode($a));
?>