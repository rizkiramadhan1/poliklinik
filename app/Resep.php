<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    public function dokter() {

        return $this->belongsTo('App\Dokter');  

    }

    public function pasien() {

        return $this->belongsTo('App\Pasien');  

    }

    public function poliklinik() {

        return $this->belongsTo('App\Poliklinik');  

    }

    protected $table = 'resep';
    protected $fillable = 
    ['dokter_id',
    'pasien_id',
    'poliklinik_id',
    'tgl',
    'total_harga',
    'bayar',
    'kembali'];

    public $timestamps = false;
}
