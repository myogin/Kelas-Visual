<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function course()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-course')) return $next($request);
            abort(404, 'Halaman Tidak Ditemukan');
        });
        $lessons = \App\Lesson::All();
        $pratices = \App\Practice::All();
        $lessonss = \App\Lesson::with('practice')->get();
        return view('course.index', ['pratices' => $pratices, 'lessonss' => $lessonss]);
    }
    public function apiless()
    {
        $lessons = DB::table('lessons')
        ->join('practices', 'practices.id', '=', 'lessons.id')->get();
        $lessonss = \App\Lesson::with('practice')->get();

        return $lessonss;
    }
}
