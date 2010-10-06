<?php
interface Instapaper_ResponseInterface
{
    function isSuccess();
    function isFailed();
    function statusCode();
    function message();
}
