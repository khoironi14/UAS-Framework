<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pemakaian;
use App\Models\Pelanggan;
use App\Models\Tarif;
use RealRashid\SweetAlert\Facades\Alert;
class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran=Pembayaran::join('table_pelanggan','pembayarans.pelanggan_id','=','table_pelanggan.id')
        ->select('pembayarans.id','nama_pelanggan','bulan','jumlah_bayar')
        ->get();

        return view('view_pembayaran',['pembayaran'=>$pembayaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarif=Tarif::first();
        $pelanggan=Pelanggan::get();
        return view('add_pembayaran',['pelanggan'=>$pelanggan,'tarif'=>$tarif]);
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
            'jumlah_bayar'=>['required'],
            'bulan'=>['required'],
            'tanggal_bayar'=>['required']


        ]);
        $pembayaran=Pembayaran::create($validator);
        $update=Pemakaian::where(['pelanggan_id'=>$request->pelanggan_id,'bulan'=>$request->bulan])->update(['status_pembayaran'=>1]);
        Alert::toast('Data Berhasil ditambah');
            return redirect('/pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$bulan)
    {
        $pemakaian=Pemakaian::where(['pelanggan_id'=>$id,'bulan'=>$bulan])->first();
        return $pemakaian;
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
        Pembayaran::destroy($id);
        Alert::toast('Data Berhasil dihapus');
            return redirect('/pembayaran');
    }
}
