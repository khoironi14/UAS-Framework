<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;
use RealRashid\SweetAlert\Facades\Alert;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tarif=Tarif::get();
            return view('view_tarif',['tarif'=>$tarif]);
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarif=Tarif::first();
        if($tarif !=null){

            $tarif->id=$tarif->id;
            $tarif->tarif=$request->tarif;
            $tarif->save();
            Alert::toast('Data Berhasil diupdated');
            return redirect('/tarif');
        }else{

            Tarif::create(['tarif'=>$request->tarif]);
            Alert::toast('Data Berhasil disimpan');
            return redirect('/tarif');
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
        //
    }
}
