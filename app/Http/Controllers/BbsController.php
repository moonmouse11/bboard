<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\Models\Bb;

class BbsController extends Controller
{
    public function index(): string
    {
//        $context = ['bbs' => Bb::latest()->get()];
        return 'Controller work';
    }

    public function detail(Bb $bb): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('detail', ['bb' => $bb]);
    }
}
