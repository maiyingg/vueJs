<?php
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: X-Reqested-With");
        header("Content-Type: application/json");
    
        require_once(__DIR__."/db/dbConnect.php");
        $student = new DataBase();
        $header = apache_request_headers();
        // if($header["userId"] == 'Root' && $header["userPass"] == '123456' && $header["systemId"] == 'Register'){
                $api = $_SERVER["REQUEST_METHOD"];
                    if($api == "GET"){

        //    $header = apache_request_headers;
                //    echo
                        $data = json_decode(file_get_contents("php://input"));
                        $sql = "delete from students where id = '{$id}'";
                        // $data['data'] = $student->query("delete from students where id = '{$data->id}'");
                        $result = $student->exec($sql);
                        if($result> 0){
                                $msg['status'] = 1;
                                $msg['message'] = "Deleted";
                        }else{
                                $msg['status'] = 0;
                                $msg['message'] = "Delete  Invalid";
                        }
                        echo json_encode($msg);
                    }
        // }else{
        //         $msg['status'] = "0";
        //         $msg['message'] = "Insert Request";
        //         echo json_encode($msg);
        // }
?>