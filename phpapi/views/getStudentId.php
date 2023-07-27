<?php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
      header("Access-Control-Allow-Headers: X-Reqested-With");
      header("Content-Type: application/json");
  
      require_once(__DIR__."/db/dbConnect.php");
      $student = new DataBase();
      $header = apache_request_headers();
      if($header["userId"] == 'Root' && $header["userPass"] == '123456' && $header["systemId"] == 'Register'){
      $api = $_SERVER["REQUEST_METHOD"];
      if($api == "GET"){
        $data['status'] =1;
                $data['data'] = $student->query("select * from students where id='{$id}'");
                echo json_encode($data);
      }
    }else{
        $msg['status'] = "0";
        $msg['message'] = "Insert Request";
        echo json_encode($msg);
    }
?>