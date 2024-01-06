<?php

class Model {

    
    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        
    }


function curlRequest($xml, $url){ 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
	$content=curl_exec($ch);

if(curl_errno($ch))
{
	
//$content  = curl_errno($ch).' Curl error: ' . curl_error($ch);
$content = '<?xml version="1.0" encoding="UTF-8"?>
<operationResult >
   <response>
   <responsecode>000</responsecode>
    <responsemsg>Connection error, please try again.</responsemsg> 
    </response>	
</operationResult>';


}
curl_close($ch);
return trim($content);
}



}

