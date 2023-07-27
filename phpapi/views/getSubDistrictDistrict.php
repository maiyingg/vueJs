<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
    header("Access-Control-Allow-Headers: X-Reqested-With");
    header("Content-Type: application/json");

    require_once(__DIR__."/db/dbConnect.php");
    $subdistrict = new DataBase();

    $header = apache_request_headers();
    // echo json_encode($header);
    // if($header["userId"] == 'Root' && $header["userPass"] == '123456' && $header["systemId"] == 'Register'){
      $api = $_SERVER["REQUEST_METHOD"];
            if($api == "GET"){
                $data['status'] =1;
                $data['data'] = $subdistrict->query("select * from subdistricts where districtID =  {$id} order by subdistrictID asc");
                echo json_encode($data);
            }
        // }else{
        //     $msg['status'] = "0";
        //     $msg['message'] = "Insert Request";
        //     echo json_encode($msg);
        //  }
    // $a = base64_encode($header["userId"].":".$header["userPass"]);
    // echo ($a);
    // echo(base64_decode($a));
?>