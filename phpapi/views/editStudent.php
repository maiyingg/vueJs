<?php
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: X-Reqested-With");
        header("Content-Type: application/json");
    
        require_once(__DIR__."/db/dbConnect.php");
        $student = new DataBase();
        $header = apache_request_headers();
        // if($header["userId"] == 'Root' && $header["userPass"] == '123456' && $header["systemId"] == 'Register'){
                $api = $_SERVER["REQUEST_METHOD"];
                if($api == "POST"){

        //    $header = apache_request_headers;
        //    echo
           $data = json_decode(file_get_contents("php://input"));
           $sql = "update students set '{$id}' ";
           $txt ="";
                if(isset($data->id)&& $data->id != ""){
                        foreach ($data as $key => $value) {
                           if($key != "id"){
                                if($txt != "") $txt .= ",";
                                 $txt .= $key." = '".$value."'";
                           }
                        }
                                $sql .= $txt;
                                $sql .= "where id= '{$data->id}'";
                                // echo($sql);
                                $result = $student->exec($sql);
                        if($result> 0){
                                $msg['status'] = 1;
                                $msg['message'] = "update";
                        }else{
                                $msg['status'] = 0;
                                $msg['message'] = "update Invalid";
                        }
                        echo json_encode($msg);
                }

        //         }else{
        //         $msg['status'] = "0";
        //         $msg['message'] = "Insert Request";
        //         echo json_encode($msg);
        //         }
        }
?>