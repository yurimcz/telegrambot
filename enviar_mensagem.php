<?php

// Substitua 'SEU_TOKEN' pelo token do seu bot e 'SEU_CHAT_ID' pelo chat ID do destinatário.
$TOKEN = 'AAFiGtz3JRYm2RW0r3R1UUO80d62Xcf2mIg';
$CHAT_ID = '1002095518491';

// Mensagem a ser enviada
$mensagem = 'Olá, esta é uma notificação do meu script para o Telegram!';

// Construa a URL da API do Telegram
$url = "https://api.telegram.org/bot$TOKEN/sendMessage";

// Parâmetros da mensagem
$data = [
    'chat_id' => $CHAT_ID,
    'text' => $mensagem
];

$options = [
    CURLOPT_URL => $url,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_RETURNTRANSFER => true
];

$ch = curl_init();
curl_setopt_array($ch, $options);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Erro na solicitação: ' . curl_error($ch);
} else {
    $data = json_decode($response, true);
    if ($data['ok'] === true) {
        echo 'Mensagem enviada com sucesso';
    } else {
        echo 'Erro ao enviar mensagem';
    }
}

curl_close($ch);
