<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tunjangan_pegawai extends Model
{
    //
    protected $table ='tunjangan_pegawais';
    protected $fillable = array('kode_tunjangan_id',
    	'pegawai_id'
    	);
 protected $visible = array('kode_tunjangan_id',
    	'pegawai_id'
    	);
  public function pegawai() {
        return $this->belongsTo('App\Pegawai', 'pegawai_id');
    }
    public function tunjangan() {
        return $this->belongsTo('App\Tunjangan', 'kode_tunjangan_id');
    }
     public function penggajihan() {
        return $this->hasMany('App\Penggajihan', 'tunjangan_pegawai_id');
    }
}
