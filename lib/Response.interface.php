<?php
interface Instapaper_ResponseInterface
{
    function isSuccess();
    function isFaild();
    function statusCode();
    function message();
}
