<?php
include('includes/httpful.phar'); 

function getApi($token,$url)
	{
		$response = \Httpful\Request::get($url)
		->addHeaders(array(
			'Authorization' => 'Token '.$token,
			'Content-Type' => 'application/json'))
		->expectsJson()
		->send();
		return json_decode($response,true);
	}


function postApi($token,$url,$dizi,$method){

	$response = \Httpful\Request::$method($url)
    ->addHeaders(array(
            'Authorization' => 'Token '.$token,            
            'Content-Type' => 'application/json'
			
        ))
    ->body(json_encode($dizi))
    ->sendsJson()
    ->send();
		return json_decode($response,true);
}
$token='c35dede6bd63f5e382c540ff08558dec42a9a973';
 
    $user['username'] =$_POST["tc"];
    $user['email'] = $_POST["email"];
    $user['password1'] = $_POST["pwd1"];
    $user['password2'] =$_POST["pwd2"];
  
    $response=postApi($token,'http://127.0.0.1:8000/rest-auth/registration/?format=json',$user,'post');
    
    $users_json=getApi($token,'http://127.0.0.1:8000/users/?format=json');
    for($i=0;$i<$users_json["count"];$i++){
        if($users_json["results"][$i]["username"]==$_POST["tc"]){ 
            $user_id=$users_json["results"][$i]["id"];
        }
    }


   
    $user2['first_name'] = $_POST["ad"];
    $user2['last_name'] =$_POST["soyad"];
    $user2['username'] =$_POST["tc"];
  
    $response=postApi($token,"http://127.0.0.1:8000/users/".$user_id."/?format=json",$user2,'put');         

		//'http://127.0.0.1:8000/students/?format=json'
		
    $dizi['user'] = $user_id;
    $dizi['gender'] = $_POST["cinsiyet"];
    $dizi['number'] = $_POST["ogr_no"];
    $dizi['active_record_semester'] = $_POST["donem"];
    $dizi['birthdate'] = $_POST["dogum_tarih"];
    $dizi['department'] = $_POST["department_code"];
    $dizi['join_year'] = $_POST["yil"];
	$response=postApi($token,'http://127.0.0.1:8000/students/?format=json',$dizi,'post');

    header("Location:http://localhost/obs_management/?path=ogrenci_ekle");
		
	

?>