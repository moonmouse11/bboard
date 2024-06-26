<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Posts\Bb;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class BbsController extends Controller
{
    /**
     * Retrieves the index page.
     *
     * @return string The string 'Controller work'.
     */
    public function index(): string
    {
//        $context = ['bbs' => Bb::latest()->get()];
        return 'Controller work';
    }

    /**
     * Show the detail of the given Bb.
     *
     * @param Bb $bb The Bb instance to show detail for
     * @return View|Factory|Application
     */
    public function showDetail(Bb $bb): View|Factory|Application
    {
        return view('detail', ['bb' => $bb]);
    }
}
