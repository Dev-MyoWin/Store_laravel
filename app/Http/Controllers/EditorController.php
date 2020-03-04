<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\History;
use App\User;
use App\Http\Requests\StoreEditor;
class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('editors.index',['editors'=>User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editors.create');
    }
    public function trash(){
        $data=User::onlyTrashed()->get();
       
        return view('editors.trash',['data' =>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditor $request)
    {
        User::create(['name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);
        History::create(['description'=> Auth::user()->name." was added "." editor ".$request->name]);
        return redirect()->route('editors.index');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $editor=User::find($id);
        $editor->delete();
        return redirect()->route('editors.index');
    }

    public function softDelete()
    {
        $trash = User::withTrashed()->get();
        return $trash;
        return view('soft-delete.index',['items'=>User::withTrashed()->get()]);
    }
}
