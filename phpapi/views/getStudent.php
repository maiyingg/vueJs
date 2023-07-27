<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
    header("Access-Control-Allow-Headers: X-Reqested-With");
    header("Content-Type: application/json");

    require_once(__DIR__."/db/dbConnect.php");
    $student = new DataBase();

    $header = apache_request_headers();
    // echo json_encode($header);
    // if($header["userId"] == 'Root' && $header["userPass"] == '123456' && $header["systemId"] == 'Register'){

            $api = $_SERVER["REQUEST_METHOD"];
            if($api == "GET"){
                $data['status'] =1;
                $data['data'] = $student->query("SELECT s.*,p.provinceThaiName,d.districtThaiName,sd.subDistrictThaiName
                                                    FROM register3.students s
                                                     left join register3.provinces p on(s.stdProvince = p.provinceID)
                                                     left join register3.districts d on(s.stdDistict = d.districtID)
                                                     left join register3.subdistricts sd on(s.stdSubDistict = sd.subDistrictID)");
                echo json_encode($data);
            }
        // }else{
        //     $msg['status'] = "0";
        //     $msg['message'] = "Insert Request";
        //     echo json_encode($msg);
    // }
    // $a = base64_encode($header["userId"].":".$header["userPass"]);
    // echo ($a);
    // echo(base64_decode($a));
?>