<?php
require_once dirname(__FILE__).'/Response.interface.php';
abstract class Instapaper_Response implements Instapaper_ResponseInterface
{
    protected $statusCode;
    protected $message;

    function __construct($http_response_header)
    {
        list($version, $status_code, $message) = explode(' ', $http_response_header[0], 3);
        $this->statusCode = intval($status_code);
        $this->message = $message;
    }

    function isSuccess()
    {
        if ($this->statusCode == 200) return true;
        return false;
    }

    function isFailed()
    {
        return !$this->isSuccess();
    }

    function statusCode()
    {
        return $this->statusCode;
    }

    function message()
    {
        return $this->message;
    }
}
