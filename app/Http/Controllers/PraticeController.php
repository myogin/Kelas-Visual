<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Datatables;

class PraticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lessons = \App\Lesson::All();
        $pratices = \App\Practice::paginate(10);
        return view('pratices.index', ['pratices' => $pratices, 'lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("pratices.create");
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
            "pratice_name" => "required|min:5|max:100"
        ])->validate();

        $new_pratice = new \App\Practice;
        $new_pratice->lesson_id = $request->get('lesson_id');
        $new_pratice->pratice_name = $request->get('pratice_name');
        $new_pratice->link = $request->get('link');
        $new_pratice->description = $request->get('description');
        $new_pratice->save();

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
        $pratice = \App\Practice::findOrFail($id);
        return $pratice;
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
        $pratice = \App\Practice::findOrFail($id);
        return $pratice;
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

        $pratice = \App\Practice::findOrFail($id);
        $pratice->lesson_id = $request->get('lesson_id');
        $pratice->pratice_name = $request->get('pratice_name');
        $pratice->link = $request->get('link');
        $pratice->description = $request->get('description');

        $user->update();
        return response()->json([
            'success' => true,
            'message' => 'Pratice Updated'
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
        $pratice = \App\Pratice::findOrFail($id);


        $pratice->delete();
        return response()->json([
            'success' => true,
            'message' => 'Pratice Deleted'
        ]);
    }
    public function apipratice()
    {
        $pratice = \App\Practice::orderBy('id', 'DESC')->get();
        return Datatables::of($pratice)

            ->addColumn('action', function($pratice){
                return '' .
                '<a onclick="editForm('. $pratice->id .')" class="btn btn-info btn-flat btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> '.
                '<a onclick="showForm('. $pratice->id .')" class="btn btn-success btn-flat btn-xs"><i class="fa fa-eye"></i> Show</a> '  ;
            })
            ->rawColumns(['show_photo', 'action'])->make(true);
    }
}
