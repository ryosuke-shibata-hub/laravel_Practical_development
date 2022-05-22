<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Person;

class HelloController extends Controller
{
    function __construct()
    {
        config(['sample.message' => '新しいメッセージ！']);
    }
    // public function index(Request $request)
    // {
    //     $data = [
    //         'msg' => $request->hello,
    //     ];

    //     return view('hello.index',$data);
    // }

    // public function index($person)
    // {
    //     $data = [
    //         'msg' => $person,
    //     ];

    //     return view('hello.index',$data);
    // }

    // public function index(Request $request,Response $response)
    // {
    //     $msg = 'please input text';
    //     $keys = [];
    //     $values = [];

    //     if($request->isMethod('post')) {
    //         // $form = $request->all();
    //         $form = $request->only(['name','mail']);
    //         $keys = array_keys($form);
    //         $values = array_values($form);
    //         $msg = old('name') . ', ' . old('mail') . ', ' . old('tel');
    //         // $result = '<html><body>';

    //         // foreach ($form as $key => $value) {
    //         //     $result .= $key . ': ' . $value . "<br>";
    //         // }

    //         // $result .= '</body></html>';
    //         // $response->setContent($result);
    //         // return $response;
    //         $data = [
    //         'msg' => $msg,
    //         'keys' => $keys,
    //         'values' => $values,
    //     ];
    //         $request->flash();
    //         return view('hello.index',$data);
    //     }

    //     $data = [
    //         'msg' => $msg,
    //         'keys' => $keys,
    //         'values' => $values,
    //     ];
    //     $request->flash();
    //     return view('hello.index',$data);
    // }

    public function index(Request $request,Response $response)
    {
        $name = $request->query('name');
        $mail = $request->query('mail');
        $tel = $request->query('tel');
        $msg = $request->query('msg');
        // $msg = $name . ', ' . $mail . ', ' . $tel;
        $keys = ['名前','メール','電話'];
        $values = [$name,$mail,$tel];

        $data = [
            'msg' => $msg,
            'keys' => $keys,
            'values' => $values,
        ];

        $request->flash();
        return view('hello.index',$data);
    }

    // public function other(Request $request)
    // {
    //     $data = [
    //         'msg' => $request->bye,
    //     ];

    //     return view('hello.index',$data);
    // }
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