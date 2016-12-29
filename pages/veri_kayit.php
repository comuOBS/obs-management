<?php
    
    include "../includes/config.php";
    include "../includes/functions.php";

	$user_token = $_SESSION["key"];
	$userName = $_SESSION["userName"];
 
    $user['username'] =$_POST["tc"];
    $user['email'] = $_POST["email"];
    $user['password1'] = $_POST["pwd1"];
    $user['password2'] =$_POST["pwd2"];
  
    $response=postApi($user_token,'http://127.0.0.1:8000/rest-auth/registration/?format=json',$user,'post');
    
    $users_json=getApi($user_token,'http://127.0.0.1:8000/users/?format=json');
    for($i=0;$i<$users_json["count"];$i++){
        if($users_json["results"][$i]["username"]==$_POST["tc"]){ 
            $user_id=$users_json["results"][$i]["id"];
        }
    }


   
    $user2['first_name'] = $_POST["ad"];
    $user2['last_name'] =$_POST["soyad"];
    $user2['username'] =$_POST["tc"];
  
    $response=postApi($user_token,"http://127.0.0.1:8000/users/".$user_id."/?format=json",$user2,'put');         

		//'http://127.0.0.1:8000/students/?format=json'
		
    $dizi['user'] = $user_id;
    $dizi['gender'] = $_POST["cinsiyet"];
    $dizi['number'] = $_POST["ogr_no"];
    $dizi['active_record_semester'] = $_POST["donem"];
    $dizi['birthdate'] = $_POST["dogum_tarih"];
    $dizi['department'] = $_POST["department_code"];
    $dizi['join_year'] = $_POST["yil"];
	$response=postApi($user_token,'http://127.0.0.1:8000/students/?format=json',$dizi,'post');

    
	

?>