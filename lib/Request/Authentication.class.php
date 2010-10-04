<?php
require_once dirname(__FILE__).'/../Request.class.php';
require_once dirname(__FILE__).'/../Account.class.php';
require_once dirname(__FILE__).'/../Response/Authentication.class.php';
class Instapaper_Request_Authentication extends Instapaper_Request
{
    protected $account;

    function __construct($account)
    {
        if (Instapaper_Account::invalid($account)) throw new InvalidArgumentException('invalid account');
        $this->account = $account;
    }

    function SSLUrl()
    {
        return 'https://www.instapaper.com/api/authenticate';
    }

    function url()
    {
        return 'http://www.instapaper.com/api/authenticate';
    }

    function params()
    {
        return array('username' => $this->account->username(),
                     'password' => $this->account->password());
    }

    function headers()
    {
        return array();
    }

    function response($http_response_header)
    {
        return new Instapaper_Response_Authentication($http_response_header);
    }
}
