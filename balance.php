<?php
/** Code By Yudha_Ard | 2022-03-24 **/
  function formatRp($input){
    $rp = number_format($input,2,',','.');
    return $rp;
  }
  echo "=========================================================\n";
  echo "API KEY : ";
  $input_apiKey = fopen("php://stdin","r");
  $iak = trim(fgets($input_apiKey));
  echo "=========================================================\n";

  $url = "https://api.xendit.co/balance";
  $apiKey = $iak;
  

  $headers = [];

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_USERPWD, $apiKey.":");
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 
  $res = curl_exec($curl);
  curl_close($curl);

  $dataRes = json_decode($res, true);
    if(is_null($dataRes)) { 
        echo "================================================\n";
        echo "  Null Data !\n";
        echo "================================================\n";
    } else if(empty($dataRes["balance"])) {
        echo "================================================\n";
        echo "  Empty Data !\n";
        echo "================================================\n";
    } else {
       echo "Saldo   : Rp.".formatRP($dataRes["balance"])."\n";
       echo "=========================================================";
    }

?>
