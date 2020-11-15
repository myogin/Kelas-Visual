<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Datatables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = \App\User::paginate(10);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("users.create");

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
            "name" => "required|min:5|max:100",
            "password" => "required",
            "password2" => "required|same:password"
        ])->validate();

        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));

        $new_user->role = $request->get('role');
        $new_user->save();

        return response()->json([
            'success' => true,
            'message' => 'Category Created'
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
        $user = \App\User::findOrFail($id);
        return $user;
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
        $user = \App\User::findOrFail($id);
        return $user;
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
            "name" => "required|min:5|max:100",
            "email" => "required|email|unique:users,email,".$id,
            "password2" => "same:password"
        ])->validate();

        $user = \App\User::findOrFail($id);
        $user->name = $request->get('name');
        $user->password = \Hash::make($request->get('password'));

        $user->update();
        return response()->json([
            'success' => true,
            'message' => 'User Created'
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
        $user = \App\User::findOrFail($id);


        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);
    }
    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $users = \App\User::where("name", "LIKE", "%$keyword%")->get();
        return $users;
    }
    public function apiuser()
    {
        $user = \App\User::orderBy('id', 'DESC')->get();
        return Datatables::of($user)

            ->addColumn('action', function($user){
                return '' .
                '<a onclick="editForm('. $user->id .')" class="btn btn-info btn-flat btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> '.
                '<a onclick="showForm('. $user->id .')" class="btn btn-success btn-flat btn-xs"><i class="fa fa-eye"></i> Show</a> '  ;
            })
            ->rawColumns(['show_photo', 'action'])->make(true);
    }
}
