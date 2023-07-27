<?php
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
        header("Access-Control-Allow-Headers: X-Reqested-With");
        header("Content-Type: application/json");
    
        require_once(__DIR__."/db/dbConnect.php");
        $student = new DataBase();
        // $header = apache_request_headers();
        // if($header["userId"] == 'Root' && $header["userPass"] == '123456' && $header["systemId"] == 'Register'){
        $api = $_SERVER["REQUEST_METHOD"];
        if($api == "POST"){
                $data = json_decode(file_get_contents("php://input"));
                // echo json_encode($data);
                $sql = "insert into students (stdPrefix,stdFname,stdLname,bdate,stdemail,stdPassw,stdAddr,stdSubDistict,
                                stdDistict,stdProvince,stdZipCode,stdPhone) 
                        value('{$data->stdPrefix}',
                                '{$data->stdFname}',
                                '{$data->stdLname}',
                                '{$data->bdate}',
                                '{$data->stdemail}',
                                '{$data->stdPassw}',
                                '{$data->stdAddr}',
                                '{$data->stdSubDistict}',
                                '{$data->stdDistict}',
                                '{$data->stdProvince}',
                                '{$data->stdZipCode}',
                                '{$data->stdPhone}')";
                $result = $student->exec($sql);
                if($result> 0){
                        $msg['status'] = 1;
                        $msg['message'] = "Inserted";
                }else{
                        $msg['status'] = 0;
                        $msg['message'] = "Insert Invalid";
                }
                echo json_encode($msg);
                // echo json_encode($data);
        }

        // }else{
        //         $msg['status'] = "0";
        //         $msg['message'] = "Insert Request";
        //         echo json_encode($msg);
        // }
?>