<?php
require_once dirname(__FILE__).'/../lib/require.php';
$account = new Instapaper_Account('ここにユーザ名を入れる', 'ここにパスワードを入れる');
$request = new Instapaper_Request_Authentication($account);
$client = new Instapaper_Client($request);
$response = $client->request();

if ($response->isSuccess()) {
    echo "Success!\n";
}
