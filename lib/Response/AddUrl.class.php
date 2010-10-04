<?php
require_once dirname(__FILE__).'/../Response.class.php';
class Instapaper_Response_AddUrl extends Instapaper_Response
{
    function isSuccess()
    {
        if (parent::isSuccess()) return true;
        if ($this->statusCode === 201) return true;
        return false;
    }
}
