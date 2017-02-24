@extends('layouts.app')

@section('content')
       <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">

                        <h3 class="animated fadeInLeft">Customer Service</h3>
                        <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Batavia,Indonesia</p>

                       
                    </div>
                    <div class="col-md-0 col-sm-12">
                        
                       
                             
                              
                                 
                      
                    <table class="table table-striped table-hover table-bordered">
                        
                        <div class="col-md-12">
                        <center>
                            <p><img width="120px" height="100px" src="<?php echo url('assets/image/') ?>/<?php echo $datapenggajian->tunjangan_pegawai->pegawai->photo; ?>" class="img-circle" alt="Cinque Terre" ></p>

                        <h3>{{$datapenggajian->tunjangan_pegawai->pegawai->User->name}}</h3>
                        <h4>{{$datapenggajian->tunjangan_pegawai->pegawai->nip}}</h4>
                        <b>@if($datapenggajian->tanggal_pengambilan == ""&&$datapenggajian->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @elseif($datapenggajian->tanggal_pengambilan == ""||$datapenggajian->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @else
                            Gaji Sudah Diambil Pada {{$datapenggajian->tanggal_pengambilan}}
                        @endif</b>
                        <h5>Gaji Lembur Sebesar Rp.{{$datapenggajian->jumlah_uang_lembur}} ,Gaji Pokok Sebesar Rp.{{$datapenggajian->gaji_pokok}} ,Mendapat Tunjangan Sebesar Rp.{{$datapenggajian->tunjangan_pegawai->tunjangan->besaran_uang}} ,Jadi Total Gaji Rp.{{$datapenggajian->total_gaji}}



                        </h5>
                        @if(Auth::user()->type_user=='admin'||Auth::User()->type_user=='hrd')
                                <a class="btn btn-primary col-md-12" href="{{url('penggajian')}}">Kembali</a>
                             @elseif(Auth::user()->type_user=='pegawai')
                             <a class="btn btn-primary col-md-12" href="{{url('/')}}">Kembali</a>
                             @endif   
                        </center>
                        </div> 
                        
                    </table>
                </div>

            </div>
        </div>
              </div>
                          </div>
                        </div>                   
                    </div>
                  </div>                    
                </div>
@endsection
