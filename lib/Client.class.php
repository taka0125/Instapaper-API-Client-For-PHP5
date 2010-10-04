<?php
class Instapaper_Client
{
    protected $request;
    protected $useSSL;

    function __construct($request, $use_ssl = true)
    {
        $this->request = $request;
        if ($this->isInvalidUseSSL($use_ssl)) {
            $this->useSSL = true;
        } else {
            $this->useSSL = $use_ssl;
        }
    }

    function request()
    {
        if ($this->useSSL) {
            $url = $this->request->SSLUrl();
        } else {
            $url = $this->request->url();
        }
        $params = $this->request->params();
        $data = http_build_query($params);
        $headers = $this->headers($this->request);
        $options = array('http' => array('method' => 'POST',
                                         'header' => implode("\r\n", $headers),
                                         'content' => $data));
        @file_get_contents($url, false, stream_context_create($options));
        return $this->request->response($http_response_header);
    }

    function isSuccess()
    {
        return $this->request->isSuccess();
    }

    function isFaild()
    {
        return $this->request->isFaild();
    }

    protected function headers($request)
    {
        $base_headers = array('Content-type: application/x-www-form-urlencoded');
        return array_unique(array_merge($base_headers, $request->headers()));
    }

    protected function isInvalidUseSSL($value)
    {
        if (is_bool($value)) return false;
        return true;
    }
}
