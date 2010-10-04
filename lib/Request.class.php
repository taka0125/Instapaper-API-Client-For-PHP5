<?php
require_once dirname(__FILE__).'/Request.interface.php';
abstract class Instapaper_Request implements Instapaper_RequestInterface
{
    function SSLUrl()
    {
        throw new Exception();
    }

    function url()
    {
        throw new Exception();
    }

    function params()
    {
        throw new Exception();
    }

    function headers()
    {
        return array();
    }

    function response($http_response_header)
    {
        throw new Exception();
    }
}
