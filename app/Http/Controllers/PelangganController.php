<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pelanggan=Pelanggan::get();
            return view('view_pelanggan',['pelanggan'=>$pelanggan]);
        } catch (\Throwable $th) {

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_pelanggan');
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
            'nama_pelanggan'=>['required'],
            'alamat'=>['required'],
            'nomer_hp'=>['required'],
            'email'=>['required|unique:users'],
           // 'password'=>['required',Password::min(8)]

        ]);
        try {
            //$validator['created_by'] =User::id();
            Pelanggan::create($validator);
            Alert::toast('Data Berhasil ditambah');
            return redirect('/pelanggan');
        } catch (\Throwable $th) {
            return redirect('/pelanggan/add')->with('Something Errors');
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
            $edit=Pelanggan::find($id);
            return view('edit_pelanggan',['edit'=>$edit]);
        } catch (\Throwable $th) {
            return redirect('/pelanggan/edit')->with('Something Errors');
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
            'nama_pelanggan'=>['required'],
            'alamat'=>['required'],
            'nomer_hp'=>['required']

        ]);
        try {
            Pelanggan::where('id',$id)->update($validator);
            Alert::toast('Data Berhasil diupdated');
            return redirect('/pelanggan');

        } catch (\Throwable $th) {
            return redirect('/pelanggan/edit')->with('Something Errors');
        }
    }
    public function destroy($id)
    {
        try {
            Pelanggan::destroy($id);
            Alert::toast('Data Berhasil dihapus');
            return redirect('/pelanggan');

        } catch (\Throwable $th) {
            return redirect('/pelanggan')->with('Something Errors');
        }
    }
}
