<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Person;
use App\MyClass\MyService;

class HelloController extends Controller
{
    function __construct()
    {
        config(['sample.message' => '新しいメッセージ！']);
    }

    public function index(MyService $myservice)
    {
        $data = [
            'msg' => $myservice->say(),
            'data' => $myservice->data(),
        ];

        return view('hello.index',$data);
    }

    public function other()
    {
        $data = [
            'name' => 'taro',
            'mail' => 'email@email',
            'tel' => '090-999-999',
        ];
        $query_str = http_build_query($data);
        $data['msg'] = $query_str;

        return redirect()->route('hello',$data);
    }
}