<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $fname;

    function __construct()
    {
        // config(['sample.message' => '新しいメッセージ！']);
        // $this->fname = 'sample.txt';
        $this->fname = 'hello.txt';
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

    // public function index()
    // {
    //     ①
    //     $sample_msg = config('sample.message');
    //     $sample_data = config('sample.data');
    //     ②
    //     $sample_msg = env('SAMPLE_MESSAGE');
    //     $sample_data = env('SAMPLE_DATA');
    //     ③
    //     $sample_msg = $this->fname;
    //     $sample_data = Storage::get($this->fname);
    //     ①
    //     $data = [
    //         'msg' => $sample_msg,
    //         'data' => $sample_data,
    //     ];
    //     ②
    //     $data = [
    //         'msg' => $sample_msg,
    //         'data' => explode(',', $sample_data),
    //     ];
    //     ③
    //     $data = [
    //         'msg' => $sample_msg,
    //         'data' => explode(PHP_EOL,$sample_data),
    //     ];
    //     ④
    //     $data = [
    //         'msg' => $result,
    //         'data' => explode(PHP_EOL,$sample_data),
    //     ];

    //     return view('hello.index',$data);
    // }


    public function index()
    {
    $url = Storage::disk('public')->url($this->fname);
    $size = Storage::disk('public')->size($this->fname);
    $modified = Storage::disk('public')
        ->lastModified($this->fname);
    $modified_time = date('y-m-d H:i:s', $modified);
    $sample_keys = ['url', 'size', 'modified'];
    $sample_meta = [$url, $size, $modified_time];
    $result = '<table><tr><th>' . implode('</th><th>',
        $sample_keys) . '</th></tr>';
    $result .= '<tr><td>' . implode('</td><td>',
        $sample_meta) . '</td></tr></table>';

    $sample_data = Storage::disk('public')->get($this->fname);


    $data = [
        'msg'=> $result,
        'data'=> explode(PHP_EOL, $sample_data)
    ];
    return view('hello.index', $data);
    }


    // public function other(Request $request)
    // {
        // $data = [
        //     'msg' => $request->bye,
        // ];

        // return view('hello.index',$data);


    //     return redirect()->route('sample');
    // }

    public function other($msg)
    {
        // $data = Storage::get($this->fname) . PHP_EOL . $msg;
        // Storage::put($this->fname, $data);

        // Storage::append($this->fname, $msg);

        Storage::disk('public')->prepend($this->fname,$msg);

        return redirect()->route('index');

    }
}