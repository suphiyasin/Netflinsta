<?php

//Instagram Settings
$instagramMail = '';
$FirstNameOnInstagram = '';
$instagramUsername = '';
$instagramPhoneNumber = ''; //+90 555 555 55 55
$instagramcookie = '';


//Netflix Settings
$netflixcookie = '';


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.netflix.com/browse');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: www.netflix.com';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7';
$headers[] = 'Accept-Language: en-US,en;q=0.9,tr;q=0.8';
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'Cookie: '.$netflixcookie;
$headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"116\", \"Not)A;Brand\";v=\"24\", \"Google Chrome\";v=\"116\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$veri = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);



function editbio($bio, $insMail, $fname, $phonenum, $kadi, $coki){
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/api/v1/web/accounts/edit/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "biography=$bio&chaining_enabled=on&email=$insMail&external_url=&first_name=$fname&phone_number=$phonenum&username=$kadi");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: www.instagram.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-US,en;q=0.9,tr;q=0.8';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Cookie: '.$coki;
$headers[] = 'Dpr: 1.25';
$headers[] = 'Origin: https://www.instagram.com';
$headers[] = 'Referer: https://www.instagram.com/accounts/edit/';
$headers[] = 'Sec-Ch-Prefers-Color-Scheme: light';
$headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"116\", \"Not)A;Brand\";v=\"24\", \"Google Chrome\";v=\"116\"';
$headers[] = 'Sec-Ch-Ua-Full-Version-List: \"Chromium\";v=\"116.0.5845.188\", \"Not)A;Brand\";v=\"24.0.0.0\", \"Google Chrome\";v=\"116.0.5845.188\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Model: \"\"';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Ch-Ua-Platform-Version: \"15.0.0\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36';
$headers[] = 'Viewport-Width: 1536';
$headers[] = 'X-Asbd-Id: 129477';
$headers[] = 'X-Csrftoken: P87z7XURmLT2scjl1a8m1iW1tZ0qqi64';
$headers[] = 'X-Ig-App-Id: 936619743392459';
$headers[] = 'X-Ig-Www-Claim: hmac.AR3dgO8U2NgN-ME9Ez69hHz1zJBexwsJrIFChPandL_XJvIb';
$headers[] = 'X-Instagram-Ajax: 1008686388';
$headers[] = 'X-Requested-With: XMLHttpRequest';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

}





   $i = 0;
function json_Duzelt($str)
{
	$json_karakterler = array("u00fc","u011f","u0131","u015f","u00e7","u00f6","u00dc","u011e","u0130","u015e","u00c7","u00d6", "\u00E7", "\x20");
	$tr_karakterler = array("ü","ğ","ı","ş","ç","ö","Ü","Ğ","İ","Ş","Ç","Ö", "ç", " ");
	$turkce = str_replace($json_karakterler, $tr_karakterler, $str);
	
	$kimi = explode('\x20', $turkce);
	$sonti = '';
	foreach($kimi as $kiml){
		$sonti = $sonti.$kiml.' ';
	}
	return $sonti;
}

   $expt1 = explode('"bookmarkPosition":{', $veri);
   $expt2 = explode('\\x24type":"atom","value":', $expt1[1]);
	$baci = explode(',"\\x24expires":', $expt2[1]);
	
   $expt3 = explode('"runtime":{', $expt1[1]);
   $expt4 = explode('"value":', $expt3[1]);
   $expt5 = explode('}', $expt4[1]);
   
   $expt6 = explode('"value":"', $expt1[0]);
   $expt7 = explode('"', end($expt6));

   $simdi = $baci[0];
   $bitis = $expt5[0];
   $adi = $expt7[0];
   
   //math 
   $yuzdesimdi = $simdi * 100;
   $yuzde = $yuzdesimdi / $bitis;
   $forbio = ceil($yuzde / 10);
   $simge = '━';
   $durum = '►';
   $ki = 0;
   while($ki < $forbio){
	   $durum = $durum.$simge;
	   $ki = $ki + 1;
   }
   $durum = $durum.'❁';
   $xi = 0;
   $ix = ceil(10 - $forbio);
    while($xi < $ix){
	   $durum = $durum.$simge;
	   $xi = $xi + 1;
   }
   //｡☆✼★━━━━━━━━━━━━★✼☆｡
   echo $durum;
   echo "<br/>";
   echo 'AD: '.json_Duzelt($adi);
   $direkdurum = json_Duzelt($adi).'
   '.$durum;
   editbio($direkdurum, $instagramMail, $FirstNameOnInstagram, $instagramPhoneNumber, $instagramUsername, $instagramcookie);
  
  
