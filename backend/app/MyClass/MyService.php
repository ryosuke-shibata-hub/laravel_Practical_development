<?php
namespace App\MyClass;

use App\MyClass\MyServiceInterface;

class MyService implements MyServiceInterface
{

    // private $msg;
    // private $data;
    private $id = -1;
    private $msg = 'no id...';
    private $data = ['hello','welcome','bye'];
    // private $myservice;
    private $serial;

    public function __construct(int $id)
    {
        $this->setId($id);
        $this->serial = rand();
        echo "「" . $this->serial . "」";
    }
    // public function __construct(int $id = -1)
    // {
    //     // $this->msg = 'Hello! this is Myservice';
    //     // $this->data = ['Hello','welcome','bye'];
    //     // if($id >= 0) {
    //     //     $this->id = $id;
    //     //     $this->msg = 'select: ' . $this->data[$id];
    //     // }
    //     $this->serial = rand();
    //     echo "「" . $this->serial . "」";
    // }

    // public static function getInstance()
    // {
    //     return self::$myservice ?? self::$myservice = new MyService();
    // }

    public function setId($id)
    {
        $this->id = $id;
        if($id >= 0 && $id < count($this->data)) {
            $this->msg = "select id:" . $id . ',data:"' . $this->data[$id] . '"';
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data(int $id)
    {
        return $this->data[$id];
    }

    public function allData()
    {
        return $this->data;
    }
}