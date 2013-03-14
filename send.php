<?php
// RegistrationIDを指定して送信
$regid = "";  
if($regid !== ""){
	//register.phpとセットで試すんであればこっち。
	$fp = fopen('register.txt','r');
	$regid = fgets($fp);
	fclose($fp);
}
$apikey = ""; // ここにAPI Key
$message = "test message";
$detail = "detail";
$url = 'https://android.googleapis.com/gcm/send';

$headers = array(
    "Authorization: key=$apikey",
    'Content-Type: application/json',
    );
$data = array(
    'registration_ids' => array($regid),
    'collapse_key' => 'update',
    'delay_while_idle' => false,
    'time_to_live' => 86400,
    'data'=>array('message'=>$message,
                'detail'=>$detail)
    );
$data = json_encode($data);
echo $data,"\n\n<br />";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$res = curl_exec($curl);

//結果出力
echo "register id:".$regid." \n<br />";
echo "api key:".$apikey." \n<br />";
echo "response:".$res;


