<?php
class Instapaper_Account
{
    protected $username;
    protected $password;

    function __construct($username = null, $password = null)
    {
        $this->username = $username;
        $this->password = $password;
    }

    function username()
    {
        return $this->username;
    }

    function password()
    {
        return $this->password;
    }

    function setUsername($value)
    {
        if ($this->isInvalidUsername($value)) throw new InvalidArgumentException('invalid username.');
        $this->username = $value;
    }

    function setPassword($value)
    {
        if ($this->isInvalidPassword($value)) throw new InvalidArgumentException('invalid password.');
        $this->password = $value;
    }

    protected function isInvalidUsername($value)
    {
        if (!is_string($value)) return true;
        if (strlen($value) < 1) return true;
        return false;
    }

    protected function isInvalidPassword($value)
    {
        if (!is_string($value)) return true;
        if (strlen($value) < 1) return true;
        return false;
    }

    static function invalid($value)
    {
        if ($value instanceof self) return false;
        return true;
    }
}
