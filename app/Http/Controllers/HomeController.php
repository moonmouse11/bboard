<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bb;

class HomeController extends Controller
{
    private const BB_VALIDATOR = [
        'title' => 'required|max:50',
        'content' => 'required',
        'price' => 'required|numeric',
        'category' => 'required|max:50',
        'type' => ''
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('home',
            ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }

    public function create()
    {
        return view('bb-create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(self::BB_VALIDATOR);
        Auth::user()->bbs()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
        ]);

        return redirect()->route('home');
    }

    public function edit(Bb $bb)
    {
        return view('bb-edit', ['bb' => $bb]);
    }

    public function update(Request $request, Bb $bb)
    {
        $validated = $request->validate(self::BB_VALIDATOR);
        $bb->fill([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
        ]);
        $bb->save();

        return redirect()->route('home');
    }

    public function delete(Bb $bb)
    {
        return view('bb-delete', ['bb' => $bb]);
    }

    public function destroy(Bb $bb)
    {
        $bb->delete();

        return redirect()->route('home');
    }
}
