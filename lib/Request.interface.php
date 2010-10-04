<?php
interface Instapaper_RequestInterface
{
    function url();
    function SSLUrl();
    function params();
    function headers();
    function response($http_response_header);
}
