<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Datatables;
class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lessons = \App\Lesson::paginate(10);
        return view('lessons.index', ['lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("lessons.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validation = \Validator::make($request->all(),[
            "name" => "required|min:5|max:100"
        ])->validate();

        $new_lesson = new \App\Lesson;
        $new_lesson->name = $request->get('name');

        $new_lesson->save();

        return response()->json([
            'success' => true,
            'message' => 'Lesson Created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $lesson = \App\Lesson::findOrFail($id);
        return $lesson;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $lesson = \App\Lesson::findOrFail($id);
        return $lesson;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validation = \Validator::make($request->all(),[
            "name" => "required|min:5|max:100"
        ])->validate();

        $lesson = \App\Lesson::findOrFail($id);
        $lesson->name = $request->get('name');

        $user->update();
        return response()->json([
            'success' => true,
            'message' => 'Lesson Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $lesson = \App\Lesson::findOrFail($id);


        $lesson->delete();
        return response()->json([
            'success' => true,
            'message' => 'Lesson Deleted'
        ]);
    }
    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $lessons = \App\Lesson::where("name", "LIKE", "%$keyword%")->get();
        return $lessons;
    }
    public function apilesson()
    {
        $lesson = \App\Lesson::orderBy('id', 'DESC')->get();
        return Datatables::of($lesson)

            ->addColumn('action', function($lesson){
                return '' .
                '<a onclick="editForm('. $lesson->id .')" class="btn btn-info btn-flat btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> '.
                '<a onclick="showForm('. $lesson->id .')" class="btn btn-success btn-flat btn-xs"><i class="fa fa-eye"></i> Show</a> '  ;
            })
            ->rawColumns(['show_photo', 'action'])->make(true);
    }
}
