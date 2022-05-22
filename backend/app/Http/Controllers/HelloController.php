<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Person;
use App\MyClass\MyService;
use App\MyClass\MyServiceInterface;
class HelloController extends Controller
{
    function __construct()
    {
        // config(['sample.message' => '新しいメッセージ！']);
        // $myservice = app('App\MyClass\MyService');
    }

    // public function index()
    // {
    //     //下記3つはの処理はどれも同じ
    //     // $myservice = app('App\MyClass\MyService');
    //     // $myservice = app()->make('App\MyClass\MyService');
    //     $myservice = resolve('App\MyClass\MyService');

    //     $data = [
    //         'msg' => $myservice->say(),
    //         'data' => $myservice->data(),
    //     ];

    //     return view('hello.index',$data);
    // }

    // public function index(int $id = -1)
    // {
    //     $myservice = app()->makeWith('App\MyClass\MyService',['id' => $id]);
    //     $data = [
    //         'msg' => $myservice->say(),
    //         'data' => $myservice->alldata(),
    //     ];
    //     return view('hello.index',$data);
    // }

    // public function index(MyService $myservice, int $id = -1)
    // {
    //     $myservice->setId($id);
    //     $data = [
    //         'msg' => $myservice->say(),
    //         'data' => $myservice->alldata(),
    //     ];

    //     return view('hello.index',$data);
    // }

    public function index(MyServiceInterface $myservice, int $id = -1)
    {
        $myservice->setId($id);
        $data = [
            'msg'=> $myservice->say(),
            'data'=> $myservice->alldata(),
        ];
        return view('hello.index', $data);
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