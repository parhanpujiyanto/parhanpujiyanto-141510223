<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\Lembur_pegawai;
use App\Pegawai;
use App\Kategori_lembur;

class lemburpegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lembur=Lembur_pegawai::all();
        return view('lemburp.index',compact('lembur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai=Pegawai::all();
        $kategori=Kategori_lembur::all();
        return view('lemburp.create',compact('pegawai','kategori'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles=[
            'kode_lembur_id'=>'required|unique:lembur_pegawais',
            'pegawai_id'=>'required',
            'Jumlah_jam'=>'required',
        ];
        $sms=[
            'kode_lembur_id.required'=>'jangan kosong',
            'kode_lembur_id.unique'=>'jangan sama',
            'pegawai_id.required'=>'jangan kosong',
            'Jumlah_jam.required'=>'jangan kosong',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back()
                    ->WithErrors($validasi)
                    ->WithInput();
        }
        $lembur=Request::all();
        Lembur_pegawai::create($lembur);
        return redirect('lemburp');
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
        $pegawai=Pegawai::all();
        $kategori=Kategori_lembur::all();
        $lembur=Lembur_pegawai::find($id);
        return view('lemburp.edit',compact('lembur','pegawai','kategori'));
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
        $lembur=Lembur_pegawai::where('id',$id)->first();
        if($lembur['kode_lembur_id'] != Request('kode_lembur_id')){
            $roles=[
            'kode_lembur_id'=>'required',
            'pegawai_id'=>'required',
            'Jumlah_jam'=>'required',
        ];
        }
        else{
            $roles=[
            'kode_lembur_id'=>'required|unique:lembur_pegawais',
            'pegawai_id'=>'required',
            'Jumlah_jam'=>'required',
        ];
        }
        $sms=[
            'kode_lembur_id.required'=>'jangan kosong',
            'kode_lembur_id.unique'=>'jangan sama',
            'pegawai_id.required'=>'jangan kosong',
            'Jumlah_jam.required'=>'jangan kosong',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back()
                    ->WithErrors($validasi)
                    ->WithInput();
        }
        $update=Request::all();
        $lembur=Lembur_pegawai::find($id);
        $lembur->update($update);
        return redirect('lemburp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lembur=Lembur_pegawai::find($id)->delete();
        return redirect('lemburp');
    }
}
