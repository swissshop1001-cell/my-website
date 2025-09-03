<?php
$data = json_decode(file_get_contents('php://input'), true);
$token = '8216167852:AAFmidlIagOFmnJ1z3TedpTHWq0EAccYnYM';
$chat_id = '5508250297';

$message = "Новый заказ:\n";
$message .= "Имя: ".$data['name']."\n";
$message .= "Телефон: ".$data['phone']."\n";
$message .= "Товары:\n";
foreach($data['items'] as $item){
    $message .= $item['name']." - ".$item['price']." BYN x ".$item['qty']."\n";
}

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=".urlencode($message));

echo json_encode(['status'=>'ok']);
?>