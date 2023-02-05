<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemakaian;
use App\Models\Pelanggan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
class PemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pemakaian=Pemakaian::join('table_pelanggan','pemakaians.pelanggan_id','=','table_pelanggan.id')
            ->select('pemakaians.id','nama_pelanggan','bulan','jumlah_pakai')
            ->get();
            return view('view_pemakain',['pemakaian'=>$pemakaian]);
        } catch (\Throwable $th) {
            return redirect('/pemakaian')->with('Something Errors');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan=Pelanggan::get();
        return view('add_pemakaian',['pelanggan'=>$pelanggan]);
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
            'pelanggan_id'=>['required'],
            'jumlah_pakai'=>['required'],
            'bulan'=>['required'],
            'tahun'=>['required']


        ]);

        try {
           // $validator['tahun'] = date('Y');


            Pemakaian::create($validator);
            Alert::toast('Data Berhasil ditambah');
            return redirect('/pemakaian');
        } catch (\Throwable $th) {
            //throw $th;
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
            $pelanggan=Pelanggan::get();
            $edit=Pemakaian::find($id);
            return view('edit_pemakaian',['edit'=>$edit,'pelanggan'=>$pelanggan]);

        } catch (\Throwable $th) {
            //throw $th;
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
            'pelanggan_id'=>['required'],
            'jumlah_pakai'=>['required'],
            'bulan'=>['required']

        ]);
        $edit=Pemakaian::where('id',$id)->update($validator);
        Alert::toast('Data Berhasil diupdate');
        return redirect('/pemakaian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pemakaian::destroy($id);
        Alert::toast('Data Berhasil dihapus');
        return redirect('/pemakaian');
    }
}
