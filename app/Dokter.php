<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{

    public function poliklinik() {

        return $this->belongsTo('App\Poliklinik');  

    }

    protected $table = 'dokter';
    protected $fillable = 
    ['kode_dokter',
    'nama',
    'spesialis',
    'alamat',
    'telepon',
    'poliklinik_id',
    'tarif'];

    public $timestamps = false;
}
