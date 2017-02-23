<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\Golongan;
use App\Jabatan;
use App\Pegawai;
use App\Tunjangan_pegawai;
use App\User;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function __construct()
    {
        $this->middleware('hrd');
    }
    public function index()
    {
        $pegawai=Pegawai::all();
        $tunjangan_pegawai=Tunjangan_pegawai::all();
        return view('pegawai.index',compact('pegawai','tunjangan_pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $golongan=Golongan::all();
         $jabatan=Jabatan::all();
         $user=User::all();
        return view('pegawai.create',compact('golongan','jabatan','user'));
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
            'nip'=>'required|unique:pegawais',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'photo'=>'required',
            'name' => 'required|max:255',
            'type_user' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
 $sms=[
            'nip.required'=>'jangan kosong',
            'nip.unique'=>'jangan sama',
            'jabatan_id.required'=>'jangan kosong',
            'golongan_id.required'=>'jangan kosong',
            'photo.required'=>'jangan kosong',
            'name.required'=>'jangan kosong',
            'name.max'=>'max 255',
            'type_user.required'=>'jangan kosong',
            'email.required'=>'jangan kosong',
            'email.email'=>'harus berbentuk email',
            'email.max'=>'max 255',
            'email.unique'=>'sudah ada',
            'password.required'=>'jangan kosong',
            'password.min'=>'min 6',
            'password.confirmed'=>'belum kompirmasi',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back()
                ->WithErrors($validasi)
                ->WithInput();
        }
        $user=new User;
        $user->name = Request('name');
        $user->type_user = Request('type_user');
        $user->email = Request('email');
        $user->password = bcrypt(Request('password'));
        $user->save();
        $user = User::all();
        foreach ($user as $data ) {
            $di=$data->id;
        }

        $file= Input::file('photo');
        $destination= public_path().'/assets/image/';
        $filename=$file->getClientOriginalName();
        $uploadsuccess=$file->move($destination,$filename);
        if(Input::hasFile('photo')){
                $pegawai = new Pegawai;
                $pegawai->nip = Request('nip');
                $pegawai->user_id = $di;
                $pegawai->jabatan_id = Request('jabatan_id');
                $pegawai->golongan_id = Request('golongan_id');
                $pegawai->photo=$filename;
                $pegawai->save();
                return redirect('pegawai');
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
        $pegawai=Pegawai::find($id)->with('user','golongan','jabatan')->first();
        $golongan=Golongan::all();
         $jabatan=Jabatan::all();
         $user=User::all();
        return view('pegawai.edit',compact('golongan','jabatan','user','pegawai'));
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
        $pegawai=Pegawai::where('id',$id)->first();
        if($pegawai['nip'] != Request('nip')){
            $roles=[
            'nip'=>'required|unique:pegawais',
            'user_id'=>'required',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'user_id'=>'required',
            'photo'=>'required',
            'name' => 'required|max:255',
            'type_user' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
        }
        else{
            $roles=[
            'nip'=>'required',
            'user_id'=>'required',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'user_id'=>'required',
            'photo'=>'required',
            'name' => 'required|max:255',
            'type_user' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
        }
        $sms=[
            'nip.required'=>'jangan kosong',
            'nip.unique'=>'jangan sama',
            'user_id.required'=>'jangan kosong',
            'jabatan_id.required'=>'jangan kosong',
            'golongan_id.required'=>'jangan kosong',
            'user_id.required'=>'jangan kosong',
            'photo.required'=>'jangan kosong',
            'name.required'=>'jangan kosong',
            'type_user.required'=>'jangan kosong',
            'name.max'=>'max 255',
            'email.required'=>'jangan kosong',
            'email.email'=>'harus ada @',
            'email.max'=>'max 255',
            'email.unique'=>'sudah ada',
            'password.required'=>'jangan kosong',
            'password.min'=>'min 6',
            'password.confirmed'=>'belum kompirmasi',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back()
                ->WithErrors($validasi)
                ->WithInput();
        }
        $file= Input::file('photo');
        $destination= '/assets/image/';
        $filename=$file->getClientOriginalName();
        $uploadsuccess=$file->move($destination,$filename);
        if($uploadsuccess){

        
                $pegawai =Pegawai::find($id);
                $pegawai->nip = Request('nip');
                $pegawai->user_id = $di;
                $pegawai->jabatan_id = Request('jabatan_id');
                $pegawai->golongan_id = Request('golongan_id');
                $pegawai->photo=$filename;
        }
        $user=User::find($pegawai->user_id);
        $user->name = Request('name');
        $user->type_user = Request('type_user');
        $user->email = Request('email');
        $user->password = bcrypt(Request('password'));
        $user->save();
        return redirect('pegawai');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai=Pegawai::find($id)->delete();
        return redirect('pegawai');
    }
}
