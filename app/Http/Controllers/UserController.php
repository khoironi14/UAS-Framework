<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user=User::get();
            return view('view_user',['user'=>$user]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=$request->validate([
            'name'=>['required'],
            'email'=>['required','unique:users'],
            'password'=>['required','min:8','same:konfirmasi'],
            'role'=>['required']

        ]);
        try {
            $validator['password'] = Hash::make($validator['password']);
            User::create($validator);
            Alert::toast('Data Berhasil ditambah');
            return redirect('/user');
        } catch (\Throwable $th) {
            return redirect('/user/add')->with('Something Errors');
        }
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
        try {
            $edit=User::find($id);
            return view('edit_user',['edit'=>$edit]);
        } catch (\Throwable $th) {
            return redirect('/user/edit')->with('Something Errors');
        }
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
        $validator=$request->validate([
            'name'=>['required'],
            'email'=>['required','unique:users,email,'.$id.''],
            'role'=>['required']

        ]);
        User::where('id',$id)->update($validator);
        return redirect('/user');
        Alert::toast('Data Berhasil diupdated');
    }


    public function destroy($id)
    {
        try {
            User::destroy($id);
            Alert::toast('Data Berhasil dihapus');
            return redirect('/user');
        } catch (\Throwable $th) {
            return redirect('/user')->with('Something Errors');
        }
    }
}
