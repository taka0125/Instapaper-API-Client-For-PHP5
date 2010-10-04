<?php
require_once dirname(__FILE__).'/../Request.class.php';
require_once dirname(__FILE__).'/../Account.class.php';
require_once dirname(__FILE__).'/../Response/AddUrl.class.php';
class Instapaper_Request_AddUrl extends Instapaper_Request
{
    protected $account;
    protected $addUrl;
    protected $title;
    protected $description;
    protected $redirect;

    function __construct($account, $add_url, $title = null, $description = null, $redirect = null)
    {
        if (Instapaper_Account::invalid($account)) throw new InvalidArgumentException('invalid account');
        $this->account = $account;
        $this->addUrl = $add_url;
        if (!$this->isInvalidTitle($title)) {
            $this->title = $title;
        }
        if (!$this->isInvalidDescription($description)) {
            $this->description = $description;
        }
        if (!$this->isInvalidRedirect($redirect)) {
            $this->redirect = $redirect;
        }
    }

    function SSLUrl()
    {
        return 'https://www.instapaper.com/api/add';
    }

    function url()
    {
        return 'http://www.instapaper.com/api/add';
    }

    function params()
    {
        $params = array('username' => $this->account->username(),
                        'password' => $this->account->password(),
                        'url' => $this->addUrl);
        if (!is_null($this->title)) {
            $params['title'] = $this->title; 
        }
        if (!is_null($this->description)) {
            $params['selection'] = $this->description;
        }
        if (!is_null($this->redirect)) {
            $params['redirect'] = $this->redirect;
        }
        return $params;
    }

    function headers()
    {
        return array();
    }

    function response($http_response_header)
    {
        return new Instapaper_Response_AddUrl($http_response_header);
    }

    protected function isInvalidTitle($value)
    {
        if (!is_string($value)) return true;
        if (strlen($value) < 1) return true;
        return false;
    }

    protected function isInvalidDescription($value)
    {
        if (!is_string($value)) return true;
        if (strlen($value) < 1) return true;
        return false;
    }

    protected function isInvalidRedirect($value)
    {
        if (!is_string($value)) return true;
        if (strlen($value)) return true;
        return false;
    }
}
