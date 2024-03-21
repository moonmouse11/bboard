<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bb;

class HomeController extends Controller
{
    private const array BOARD_VALIDATOR = [
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

    /**
     * Creates a new view for the 'bb-create' template.
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('bb-create');
    }

    /**
     * Stores a new board in the database based on the validated request data.
     *
     * @param Request $request The HTTP request object containing the validated data.
     * @return RedirectResponse Redirects the user to the home page after storing the board.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(self::BOARD_VALIDATOR);
        Auth::user()->bbs()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
        ]);

        return redirect()->route('home');
    }

    /**
     * @param Bb $bb
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Bb $bb): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('bb-edit', ['bb' => $bb]);
    }

    /**
     * Updates a Bb record with the validated data from the request.
     *
     * @param Request $request The request object containing the validated data.
     * @param Bb $bb The Bb record to be updated.
     * @return RedirectResponse The redirect response to the home route.
     */
    public function update(Request $request, Bb $bb): RedirectResponse
    {
        $validated = $request->validate(self::BOARD_VALIDATOR);
        $bb->fill([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
        ]);
        $bb->save();

        return redirect()->route('home');
    }

    /**
     * Deletes a Bb object and returns a view.
     *
     * @param Bb $bb The Bb object to be deleted.
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application The view of the deleted Bb object.
     */
    public function delete(Bb $bb): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('bb-delete', ['bb' => $bb]);
    }

    /**
     * Deletes a Bb object and redirects to the home page.
     *
     * @param Bb $bb The Bb object to be deleted.
     * @return RedirectResponse The redirect response to the home page.
     */
    public function destroy(Bb $bb): RedirectResponse
    {
        $bb->delete();    /**
     * Deletes a Bb object and redirects to the home page.
     *
     * @param Bb $bb The Bb object to be deleted.
     * @return RedirectResponse The redirect response to the home page.
     */    /**
     * Deletes a Bb object and redirects to the home page.
     *
     * @param Bb $bb The Bb object to be deleted.
     * @return RedirectResponse The redirect response to the home page.
     */

        return redirect()->route('home');
    }
}
