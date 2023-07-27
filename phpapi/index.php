<?php
  use AltoRouter as Router;
  require_once 'vendor/autoload.php';

  $router = new Router;
  $router->map("GET","/",function(){
    require __DIR__."/views/home.php";
  });

  $router->map("GET","/student",function(){
    require __DIR__."/views/getStudent.php";
  });

  $router->map("GET","/student/[i:id]",function($id){
    require __DIR__."/views/getStudentId.php";
  });

  $router->map("POST","/student",function(){
    require __DIR__."/views/addStudent.php";
  });

  $router->map("POST","/student/update/[i:id]",function($id){
    require __DIR__."/views/editStudent.php";
  });

  $router->map("GET","/student/delete/[i:id]",function($id){
    require __DIR__."/views/delStudent.php";
  });

  $router->map("GET","/province",function(){
    require __DIR__."/views/getProvince.php";
  });

  $router->map("GET","/district",function($id){
    require __DIR__."/views/getDistrict.php";
  });
  $router->map("GET","/districts/[i:id]",function($id){
    require __DIR__."/views/getDistrictProvince.php";
  });

  $router->map("GET","/subdistrict",function(){
    require __DIR__."/views/getSubDistrict.php";
  });
  $router->map("GET","/subdistrict/[i:id]",function($id){
    require __DIR__."/views/getSubDistrictDistrict.php";
  });

  $router->map("GET","/zipcode/[i:id]",function($id){
    require __DIR__."/views/getZipcodeSubDistrict.php";
  });



  $match = $router->match();
  if(is_array($match)&& is_callable($match['target'])){
    call_user_func_array($match['target'],$match['params']);
  }else{
    echo "Page Not found";
  }

?>