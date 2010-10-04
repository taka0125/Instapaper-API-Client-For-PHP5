<?php
require_once dirname(__FILE__).'/../lib/require.php';
$account = new Instapaper_Account('ここにユーザ名を入れる', 'ここにパスワードを入れる');
$request = new Instapaper_Request_AddUrl($account, 'http://www.instapaper.com/api', 'タイトル', '概要');
$client = new Instapaper_Client($request);
$response = $client->request();

var_dump($response);

if ($response->isSuccess()) {
    echo "Success!\n";
}
