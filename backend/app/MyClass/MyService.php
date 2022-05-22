<?php

namespace App\MyClass;

class MyService
{

    private $msg;
    private $data;

    public function __construct()
    {
        $this->msg = 'Hello! this is Myservice';
        $this->data = ['Hello','welcome','bye'];
    }

    public function say()
    {
        return $this->msg;
    }

    public function data()
    {
        return $this->data;
    }

}