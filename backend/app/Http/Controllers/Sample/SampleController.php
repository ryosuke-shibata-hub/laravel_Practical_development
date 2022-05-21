<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data = [
    //         'msg' => 'sample-controller-index!!',
    //     ];

    //     return view('hello.index',$data);
    // }

    public function index()
    {
        $sample_msg = config('sample.message');
        $sample_data = config('sample.data');
        $data = [
            'msg' => $sample_msg,
            'data' => $sample_data,
        ];
// dd($data);
        return view('hello.index',$data);
        // ->with('data',$data);
    }

    public function other(Request $request)
    {
        $data = [
        'msg' => 'sample-controller-other!!',
        ];

        return view('hello.index',$data);
    }
}