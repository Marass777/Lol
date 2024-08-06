<?php
include_once './settings/config.php';
global $bot_token, $chat_id;



function telegram($msg)
{
    global $bot_token, $chat_id;
    $url='https://api.telegram.org/bot'.botAAE4qosAKb-l0HUHcnkZnGmqXgPc2An7dlw_token.'/sendMessage';$data=array('chat_id'=>$chat_id,'text'=>$msg,'parse_mode' => 'html');
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,false,$context);
        return $result;
}




?>